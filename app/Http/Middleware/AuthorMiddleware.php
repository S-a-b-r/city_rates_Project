<?php

namespace App\Http\Middleware;

use App\Models\Rate;
use Closure;
use Illuminate\Http\Request;

class AuthorMiddleware
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
        //Здесь должна быть супер умная логика, но я не додумался, как по реквесту определять отзыв
        return $next($request);
    }
}
