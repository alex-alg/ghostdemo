<?php

namespace App\Http\Middleware;

use App\Helpers\User as UserHelper;

use Closure;

class IsAdminUser
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
        $user = \Auth::user();
        $userHelper = app(UserHelper::class);

        if(is_null($user) || !$userHelper->isAdmin($user)){
            return redirect()->route('home')->with('status-error', 'Access denied');
        };

        return $next($request);
    }
}
