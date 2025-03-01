<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAuthController extends Controller
{
    use ResponseTrait;
    public function get_customer() {
        return response()->json([
            'customer_id' => 1,
//        tạm để z
//            'customer_id' => Auth::user()->id,
        ], 200);
    }
}
