<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class AdminUpdateAccountRequest extends BaseRequest
{
    public function rules(): array
    {
        $userId = $this->input('id');

        return [
            'full_name' => ['required', 'string'],
            'tel' => ['required', 'numeric', 'digits:10', 'unique:users,tel,' . $userId],
            'email' => ['required', 'email', 'unique:users,email,' . $userId],
            'password' => ['nullable', 'string', 'min:6'],
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
