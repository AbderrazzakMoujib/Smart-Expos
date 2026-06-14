<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class ExternalLeadsSheetExport implements FromArray, WithHeadings, WithTitle, WithStyles, ShouldAutoSize
{
    public function __construct(
        private array  $rows,
        private string $sheetTitle
    ) {}

    public function title(): string
    {
        return substr(preg_replace('/[\/\\\?\*\[\]:\x00-\x1f]/', '-', $this->sheetTitle), 0, 31);
    }

    public function headings(): array
    {
        return ['#', 'Type', 'Nom', 'Société / Fonction', 'Email', 'Téléphone', 'Sujet / Stand', 'Message', 'Date'];
    }

    public function array(): array
    {
        $out = [];
        foreach ($this->rows as $i => $row) {
            $nom = trim(
                ($row['name']    ?? '') ?:
                ($row['full_name'] ?? '') ?:
                (trim(($row['prenom'] ?? '') . ' ' . ($row['nom'] ?? ''))) ?:
                ($row['username'] ?? '')
            ) ?: '—';

            $societe = trim(
                ($row['company']      ?? '') ?:
                ($row['society']      ?? '') ?:
                ($row['organisation'] ?? '') ?:
                ($row['societe']      ?? '') ?:
                ($row['fonction']     ?? '')
            ) ?: '—';

            $sujet = trim(
                ($row['service'] ?? '') ?:
                ($row['sector']  ?? '') ?:
                ($row['secteur'] ?? '') ?:
                ($row['subject'] ?? '') ?:
                ($row['sujet']   ?? '') ?:
                ($row['stand']   ?? '') ?:
                ($row['package'] ?? '')
            ) ?: '—';

            $out[] = [
                $i + 1,
                $row['type']      ?? '—',
                $nom,
                $societe,
                $row['email']     ?? '—',
                $row['number']    ?? $row['phone'] ?? $row['telephone'] ?? '—',
                $sujet,
                $row['message']   ?? $row['note'] ?? '—',
                $row['created_at'] ?? '—',
            ];
        }
        return $out;
    }

    public function styles(Worksheet $sheet): array
    {
        $lastCol = 'I';
        $lastRow = max(count($this->rows) + 1, 2);

        // Gold header
        $sheet->getStyle("A1:{$lastCol}1")->applyFromArray([
            'font' => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF']],
            'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'FFBB7F19']],
        ]);

        // Alternating rows (even data rows)
        for ($r = 3; $r <= $lastRow; $r += 2) {
            $sheet->getStyle("A{$r}:{$lastCol}{$r}")->applyFromArray([
                'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'FFFFF8EE']],
            ]);
        }

        return [];
    }
}
