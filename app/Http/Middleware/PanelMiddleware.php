<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Session;
class PanelMiddleware
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

        
        if (\Auth::check() && \Auth::User()->type=='admin'){
            $request->session()->flash('op', 'logged');
            return redirect(url("adminPanel"));
        }
        return $next($request);
    }
}


// return new Response(view('congreso.panel'));