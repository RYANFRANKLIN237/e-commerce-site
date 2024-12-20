<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClearSessionCookies
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

       $cookies = ['laravel_session', 'XSRF-TOKEN'];
       foreach ($cookies as $cookie) {
           $response->headers->clearCookie($cookie);
       }
       return $response;
    }
}
