<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AdminMiddleware
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
        if (!Session::has('isAdmin'))
        {
            return redirect('/')->with('status','Доступ запрещен!');
        }
        return $next($request);
    }
}
