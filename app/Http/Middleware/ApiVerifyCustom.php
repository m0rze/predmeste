<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Root\Config;

class ApiVerifyCustom
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
//        $data = $request->input("data");
//        $data = json_decode($data);
//        if(!empty($data->token))
//        {
//            $token = $data->token;
//        } elseif(!empty($request->header("token"))) {
//            $token =
//        }
        $token = $request->header("token");
        if(!empty($token) && $token === Config::$token)
        {
            return $next($request);
        }
        abort("403", "Access denied");
    }
}
