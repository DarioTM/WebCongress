<?php

namespace App\Http\Middleware;

use Closure;

class ClearCache
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->headers->set("Cache-Control", "no-cache,no-store, must-revalidate");
        return $response;
    }
}