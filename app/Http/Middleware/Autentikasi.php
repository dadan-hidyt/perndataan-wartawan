<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Autentikasi
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
        if ($request->session()->has('username')) {
            return $next($request);
        } else {
            session()->flash('messages','Silahkan login dulu');
            return redirect("login");
        }

    }
}
