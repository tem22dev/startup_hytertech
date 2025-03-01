<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminLoginRequest;
use App\Services\Admin\AdminAuthService;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public AdminAuthService $adminAuthService;

    public function __construct(AdminAuthService $adminAuthService)
    {
        $this->adminAuthService = $adminAuthService;
    }

    public function index()
    {
        return view("admin.login");
    }

    public function login(AdminLoginRequest $request)
    {
        $result = $this->adminAuthService->login($request);

        if ($result && $result['status'] == true) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login')->withErrors(['login_error' => $result['message']]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('admin.login');
    }
}
