<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class AdminCreateAccountRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string'],
            'tel' => ['required', 'unique:users,tel', 'numeric', 'digits:10'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'city' => ['required', 'exists:cities,id'],
            'district' => ['required', 'exists:districts,id'],
            'ward' => ['required', 'exists:wards,id'],
            'address' => ['nullable', 'string'],
            'avatar' => ['nullable', 'image'],
            'gender' => ['nullable'],
            'status' => ['nullable'],
        ];
    }
}
