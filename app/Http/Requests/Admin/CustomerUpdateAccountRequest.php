<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class CustomerUpdateAccountRequest extends BaseRequest
{
    public function rules(): array
    {
        $customerId = $this->input('id');

        return [
            'full_name' => ['required', 'string'],
            'tel' => ['required', 'numeric', 'digits:10', 'unique:customers,tel,' . $customerId],
            'email' => ['required', 'email', 'unique:customers,email,' . $customerId],
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
