<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Spatie\Permission\Traits\HasRoles;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                /** @var \App\Models\User */
                $user = Auth::guard($guard)->user();
                if ($user->hasRole('admin')) {
                    return redirect(RouteServiceProvider::ADMIN_HOME);
                } elseif ($user->hasRole('homestay')) {
                    return redirect(RouteServiceProvider::HOMESTAY_HOME);
                } else {
                    return redirect(RouteServiceProvider::USER_HOME);
                }
            }
        }

        return $next($request);
    }
}
