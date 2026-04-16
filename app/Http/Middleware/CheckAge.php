<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->age < 18){
            return response('Underage', 403);
        }

         if (!auth()->check()) {
        return redirect('/login');
            }
        return $next($request);  //allows request to continue otherwise request gets blocked


    }
}
