<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class AdminLoginRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'user_identifier' => ['required', 'max:200'],
            'password' => ['required', 'max:200'],
            'remember_me' => ['string'],
        ];
    }
}
