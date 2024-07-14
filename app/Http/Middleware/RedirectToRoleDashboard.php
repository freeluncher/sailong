<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class RedirectToRoleDashboard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            /** @var \App\Models\User */
            $user = Auth::user();

            if ($user->hasRole('admin')) {
                return redirect(RouteServiceProvider::ADMIN_HOME);
            } elseif ($user->hasRole('homestay')) {
                return redirect(RouteServiceProvider::HOMESTAY_HOME);
            } else {
                return redirect(RouteServiceProvider::USER_HOME);
            }
        }

        return $next($request);
    }
}