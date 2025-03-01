<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Mobile\CustomerService;

class CustomerController extends Controller
{
    public CustomerService $customerService;

    public function __construct(
        CustomerService $customerService,
    ){
        $this->customerService = $customerService;
    }

    public function updateProfile(Request $request) {
        $result = $this->customerService->updateProfile($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }

    public function updateAvatar(Request $request) {
        $result = $this->customerService->updateAvatar($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }
}