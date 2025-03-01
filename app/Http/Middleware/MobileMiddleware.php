<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MobileMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (
            $request->isMethod('POST') ||
            $request->isMethod('PUT') ||
            $request->isMethod('PATCH') ||
            $request->isMethod('DELETE')
        ) {
            $token = $request->header("X-CSRF-TOKEN");

            if (!$token || !hash_equals($request->token(), $token)) {
                return response()->json(['error' => 'Invalid CSRF Token'], 403);
            }
        }

        return $next($request);
    }
}
