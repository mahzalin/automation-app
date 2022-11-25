<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param $permission
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        $userPermission = cache()->remember('user_' . auth()->id() . ':permission_' . $permission,
            Carbon::now()->addDay(),
            function () use ($permission) {
                return auth()->user()->userPermissions()
                    ->where('title', $permission)
                    ->first();
            });
        if (!empty($userPermission)) {

            return $next($request);
        }

        return redirect('/')->with('You dont have permission!');
    }
}
