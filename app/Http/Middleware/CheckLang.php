<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->lang <= 100) {
            return redirect('home-second');
        }
        // elseif ($request->lang == 'urdu') {
        //     return redirect('contact');
        // }
        return $next($request);
    }
}
