<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class AdminCreateSensorRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:sensors,name'],
            'image' => ['required', 'image'],
            'type' => ['required'],
            'description' => ['nullable'],
        ];
    }
}
