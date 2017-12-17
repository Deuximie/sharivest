<?php

namespace App\Http\Middleware;

use Auth;
use Session;
use Closure;

class Admin
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
        if(!Auth::user()->admin)
        {
          Session::flash('info', 'Hanya Admin yang bisa mengakses halaman ini');
          return redirect()->back();
        }
        return $next($request);
    }
}
