<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $userRole = auth()->user()->role;
        // ddd($role);
        if ($role == 'superadmin') {
            if ($userRole != 'superadmin') {
                abort(403);
            }
        } else if ($role == 'admin') {
            if ($userRole != 'superadmin' && $userRole != 'admin') {
                abort(403);
            }
        }

        return $next($request);
    }
}
