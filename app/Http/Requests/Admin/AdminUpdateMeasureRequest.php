<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class AdminUpdateMeasureRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string']
        ];
    }
}
