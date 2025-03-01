<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUpdatePasswordAccountRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'new_password' => ['required', 'min:6'],
            're_password' => ['required', 'same:new_password', 'min:6'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (!$this->checkCurrentPassword()) {
                $validator->errors()->add('old_password', 'Mật khẩu hiện tại không đúng.');
            }
        });
    }

    private function checkCurrentPassword(): bool
    {
        $user = Auth::user();
        return Hash::check($this->input('old_password'), $user->password);
    }
}
