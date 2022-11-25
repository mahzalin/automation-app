<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->cookie('access_token')) {
            $user = User::where('token', $request->cookie('access_token'))
                ->first();

            if (!empty($user)) {
                Auth::setUser($user);

                return $next($request);
            }
        }

        // TODO error
        return $next($request);
    }
}

