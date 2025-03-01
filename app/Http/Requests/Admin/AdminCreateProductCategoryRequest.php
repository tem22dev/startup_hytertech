<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class AdminCreateProductCategoryRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'max:200'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:10240'],
        ];
    }
}
