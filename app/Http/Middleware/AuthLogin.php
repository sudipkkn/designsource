<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class AuthLogin
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
        if (!$request->session()->has('userid') && $request->path()!='wa-admin/login') {
            return redirect('wa-admin/login');
        }
        if($request->path()=='wa-admin/login' && $request->session()->has('userid')){
            return redirect('wa-admin');
        }
        
        
        return $next($request);
    }
}
