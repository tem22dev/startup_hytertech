<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class AdminUpdateSensorRequest extends BaseRequest
{
    public function rules(): array
    {
        $sensorId = $this->input('id');

        return [
            'name' => ['required'],
            'image' => ['nullable', 'image'],
            'type' => ['required'],
            'description' => ['nullable'],
        ];
    }
}
