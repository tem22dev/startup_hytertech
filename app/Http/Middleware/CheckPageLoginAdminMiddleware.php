<?php

namespace App\Http\Middleware;

use App\Enums\UserTypeEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPageLoginAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowUser = [
            UserTypeEnum::ROOT_ADMIN->value,
            UserTypeEnum::MEMBER_ADMIN->value,
        ];

        if (Auth::check() && in_array(Auth::user()->user_type, $allowUser)) {
            return redirect()->route('admin.dashboard');
        }

        return response()->view('admin.login');
    }
}
