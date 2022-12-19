<?php

namespace App\Http\Middleware;

use App\Models\Dude;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ValidateAuth
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
        if(empty($_COOKIE["dude"])){
            return Redirect::route("login");
        }
        $dudeCookie = $_COOKIE["dude"];
        if(empty($dudeCookie)) {
            return Redirect::route("login");
        }
        $dudeDb = Dude::where("session", "=", $dudeCookie)->get()->first();
        if(empty($dudeDb)) {
            return Redirect::route("login");
        }
        if(empty($dudeDb->session)) {
            return Redirect::route("login");
        }
        $dudeDb = $dudeDb->session;
        if($dudeCookie !== $dudeDb) {
            return Redirect::route("login");
        }
        return $next($request);
    }
}
