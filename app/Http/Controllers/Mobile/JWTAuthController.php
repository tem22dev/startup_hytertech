<?php

namespace App\Http\Controllers\Mobile;

use App\Services\Mobile\CustomerAuthService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Validator;

class JWTAuthController extends Controller
{
    public CustomerAuthService $customerAuthService;

    public function __construct(CustomerAuthService $customerAuthService)
    {
        $this->customerAuthService = $customerAuthService;
    }

    public function requireLogin() {
        return response()->json(['status' => false, 'message' => "Unauthorized! You are not logged in!"], 401);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $result = $this->customerAuthService->login($request);

        if ($result) {
            return $this->respondWithToken($result);
        }
        else
            return response()->json(['status' => false, 'message' => 'Unauthorized'], 401);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $userInfo = auth('mobile')->user();

        $data = $userInfo->toArray();

        unset($data['updated_at']);
        unset($data['email_verified_at']);

        return response()->json($data);
    }
  
    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('mobile')->logout();
  
        return response()->json(['message' => 'Successfully logged out']);
    }
  
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('mobile')->refresh());
    }
  
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('mobile')->factory()->getTTL() * 60,
            'info' => [$this->me()->original]
        ]);
    }
}
