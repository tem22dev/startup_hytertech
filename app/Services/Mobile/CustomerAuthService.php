<?php 
namespace App\Services\Mobile;

use App\Enums\StatusEnum;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomerAuthService {
    public function login($request) {
        $user = Customer::where("email", $request["username"])->orWhere("tel", $request["username"])->first();

        if ($user) {
            $credentials  = [
                ($user->email == $request["username"] ? "email" : "tel") => $request["username"],
                "password" => $request["password"]
            ];

            if ($user->status == StatusEnum::ACTIVE->value) {
                // Kiểm tra thông tin xác thực
                if (auth("mobile")->attempt($credentials)) {
                    // Nếu xác thực thành công, trả về token
                    return auth("mobile")->tokenById($user->id);
                }
            }
        }

        return false;
    }
}