<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     * Mencegah user yang sudah login mengakses halaman guest (login/register).
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Jika guard adalah 'admin', arahkan ke admin dashboard
                if ($guard === 'admin') {
                    return redirect()->route('admin.dashboard');
                }
                // Selain itu (guard 'web' / user biasa), arahkan ke user home
                return redirect()->route('user.home');
            }
        }

        return $next($request);
    }
}
