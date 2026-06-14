<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Models\User;

class ExternalLeadsService
{
    private array $sources;

    public function __construct()
    {
        $refrigBase  = rtrim(env('REFRIGAIREXPO_API_URL',    'https://refrigairexpo.com/api'),    '/');
        $seafoodBase = rtrim(env('SEAFOOD4AFRICA_API_URL',   'https://seafood4africa.com/api'),   '/');
        $defBase     = rtrim(env('DIGITALEXPORT_API_URL',    'https://digitalexportforum.ma/api'), '/');

        $refrigToken  = env('REFRIGAIREXPO_API_TOKEN',    '');
        $seafoodToken = env('SEAFOOD4AFRICA_API_TOKEN',   '');
        $defToken     = env('DIGITALEXPORTFORUM_API_TOKEN', '');

        $this->sources = [
            'refrigairexpo_exhibitors' => [
                'label' => 'Refrigairexpo — Exposants',
                'url'   => $refrigBase . '/exhibitors',
                'token' => $refrigToken,
                'color' => '#0ea5e9',
            ],
            'refrigairexpo_contacts' => [
                'label' => 'Refrigairexpo — Contacts',
                'url'   => $refrigBase . '/contacts',
                'token' => $refrigToken,
                'color' => '#0ea5e9',
            ],
            'seafood_exhibitors' => [
                'label' => 'Seafood4Africa — Exposants',
                'url'   => $seafoodBase . '/exhibitors',
                'token' => $seafoodToken,
                'color' => '#10b981',
            ],
            'seafood_contacts' => [
                'label' => 'Seafood4Africa — Contacts',
                'url'   => $seafoodBase . '/contacts',
                'token' => $seafoodToken,
                'color' => '#10b981',
            ],
            'digitalexport_contacts' => [
                'label' => 'Digital Export Forum — Contacts',
                'url'   => $defBase . '/contacts',
                'token' => $defToken,
                'color' => '#8b5cf6',
            ],
            'digitalexport_inscriptions' => [
                'label' => 'Digital Export Forum — Inscriptions',
                'url'   => $defBase . '/inscriptions',
                'token' => $defToken,
                'color' => '#8b5cf6',
            ],
        ];
    }

    public function getSources(): array
    {
        return $this->sources;
    }

    public function fetch(string $key, bool $forceRefresh = false): array
    {
        if (!isset($this->sources[$key])) {
            return ['data' => [], 'error' => 'Source inconnue.', 'cached' => false];
        }

        $cacheKey = 'ext_leads_' . $key;

        if ($forceRefresh) {
            Cache::forget($cacheKey);
            Cache::forget($cacheKey . '_assigned');
        }

        $result = Cache::remember($cacheKey, 300, fn () => $this->callApi($key));

        if (!empty($result['data'])) {
            $result['data'] = $this->assignRoundRobin($key, $result['data']);
        }

        return $result;
    }

    public function fetchAll(bool $forceRefresh = false): array
    {
        $results = [];
        foreach (array_keys($this->sources) as $key) {
            $results[$key] = $this->fetch($key, $forceRefresh);
        }
        return $results;
    }

    /**
     * Assign each row to a commercial via round-robin.
     * The assignment map is persisted in cache so it stays stable
     * across page loads (same row always goes to same commercial).
     */
    private function assignRoundRobin(string $key, array $rows): array
    {
        $commercials = User::where('dashboard_role', 'commercial')
            ->orderBy('id')
            ->pluck('id')
            ->toArray();

        if (empty($commercials)) {
            return $rows;
        }

        $mapKey = 'ext_leads_' . $key . '_assigned';

        // Load or build the assignment map keyed by row unique id
        $assignMap = Cache::get($mapKey, []);

        $count = count($commercials);

        foreach ($rows as &$row) {
            $rowId = $row['id'] ?? null;

            if ($rowId === null) {
                continue;
            }

            if (!isset($assignMap[$rowId])) {
                // Assign next commercial in sequence
                $lastIndex = count($assignMap) > 0
                    ? array_search(end($assignMap), $commercials)
                    : -1;

                $nextIndex = ($lastIndex === false || $lastIndex >= $count - 1)
                    ? 0
                    : $lastIndex + 1;

                $assignMap[$rowId] = $commercials[$nextIndex];
            }

            $row['assigned_to'] = $assignMap[$rowId];
        }
        unset($row);

        // Persist map for 24h so assignments don't reset on cache refresh
        Cache::put($mapKey, $assignMap, 86400);

        return $rows;
    }

    private function callApi(string $key): array
    {
        $source = $this->sources[$key];
        $token  = $source['token'];
        $url    = $source['url'];

        if (empty($token)) {
            return [
                'data'   => [],
                'error'  => 'API non configurée — token manquant.',
                'cached' => false,
            ];
        }

        try {
            $response = Http::withHeaders(['X-API-TOKEN' => $token])
                ->timeout(10)
                ->acceptJson()
                ->withoutVerifying()
                ->get($url);

            if ($response->successful()) {
                $body = $response->json();
                $data = $body['data'] ?? $body;

                return [
                    'data'   => is_array($data) ? $data : [],
                    'error'  => null,
                    'cached' => false,
                ];
            }

            return [
                'data'   => [],
                'error'  => 'Erreur ' . $response->status() . ' — ' . ($response->json('message') ?? 'Réponse invalide.'),
                'cached' => false,
            ];

        } catch (\Exception $e) {
            return [
                'data'   => [],
                'error'  => 'Connexion impossible : ' . $e->getMessage(),
                'cached' => false,
            ];
        }
    }
}
