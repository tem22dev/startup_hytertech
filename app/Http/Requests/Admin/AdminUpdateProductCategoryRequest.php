<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class AdminUpdateProductCategoryRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'max:200'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:10240'],
        ];
    }
}
