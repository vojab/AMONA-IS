<?php

namespace App\Http\Middleware;

use Closure;

class DisableAuthActions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $disableAuthenticationOperations = \Config::get('auth.disable_auth_actions', false);

        if ($disableAuthenticationOperations) {
            return redirect('home');
        }

        return $next($request);
    }
}
