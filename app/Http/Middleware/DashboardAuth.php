<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DashboardAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = session('dashboard_user');

        if (!$user) {
            return redirect()->route('dashboard.login');
        }

        if (!empty($roles) && !in_array($user['role'], $roles)) {
            abort(403, 'Accès refusé.');
        }

        return $next($request);
    }
}
