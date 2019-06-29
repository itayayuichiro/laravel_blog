<?php

namespace App\Http\Middleware;

use Closure;

class OnlyLoginUser
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
        $token = $request->session()->get('github_token', null);
        if (empty($token)) {
            return redirect('/login');
        }
        return $next($request);
    }
}
