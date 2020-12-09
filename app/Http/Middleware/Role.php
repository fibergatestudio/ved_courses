<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     * Проверка роли пользователя
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param $roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if ((null == $request->user()) or (!in_array($request->user()->role, $roles))) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
