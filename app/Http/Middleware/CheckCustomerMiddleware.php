<?php

namespace App\Http\Middleware;

use App\Models\Customer;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCustomerMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user_id = 1;
        $userExists = Customer::query()
            ->where('id', $user_id)
            ->exists();
        if (!$userExists) {
            return response()->json('error', 500);
        }
        return $next($request);
    }
}
