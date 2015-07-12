<?php

namespace App\Http\Middleware;

use Closure;

class demo
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

        if ($request->is('articles/create') && $request->has('foo')) { //articles/create
            return redirect('articles');
        }

        // http://localhost:8000/articles/create?foo=bar
        return $next($request);
    }
}
