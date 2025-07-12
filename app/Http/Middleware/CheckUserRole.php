<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::guard('keycloak')->check()) {
            return redirect()->route('keycloak.login');
        }

        $user = Auth::guard('keycloak')->user();

        if (!empty($roles)) {
            foreach ($roles as $role) {
                if ($user->hasRole($role)) {
                    return $next($request);
                }
            }
            abort(403, 'Unauthorized. You do not have the required role.'); // Atau redirect ke halaman error
        }

        return $next($request);
    }
}