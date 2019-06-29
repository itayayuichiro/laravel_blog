<?php

namespace App\Http\Middleware;

use Closure;

class RequestMiddleware
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
        $response = $next($request);
        if (in_array(app()->environment(), ["local", "development"])) {
            $this->writeLog($request,$response);
        }
        return $response;
    }

    private function writeLog($request,$response)                                                                                                 
    {
        $time = microtime(true) - $_SERVER["REQUEST_TIME"];
        $query = collect($request->all())->except("q")->all();
        \Log::debug($request->method(), ["type"=>"Access Log","path" => $route = \Request::path(),"status_code" => $response->status(), "time" => $time]);
    }
}