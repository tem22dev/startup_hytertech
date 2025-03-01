<?php

namespace App\Services\Admin;

use App\Enums\SensorStatusEnum;
use App\Models\Sensor;
use App\Models\SensorValue;
use App\Models\StationSensor;
use App\Traits\ImageTrait;

class SensorService
{
    use ImageTrait;

    public function getList()
    {
        return Sensor::select(Sensor::getSelectedAttributes())
            ->orderBy('id', 'desc');
    }

    public function store($request)
    {
        $imageURL = $this->storeImage($request->file('image'), 'sensors');
        $image = $imageURL['url'];

        $result = Sensor::create([
            'name' => $request->name,
            'image' => $image,
            'type' => $request->type,
            'description' => $request->description,
        ]);

        return $result;
    }

    public function getData($request)
    {
        return Sensor::where('id', $request->id)
        ->first();
    }

    public function update($request)
    {
        $sensor = Sensor::find($request->id);
        $sensor->name = $request->name;
        $sensor->type = $request->type;
        $sensor->description = $request->description;

        if ($request->file('image')) {
            if ($sensor->image) {
                $this->deleteImage($sensor->image);
            }
            $uploadFile = $this->storeImage($request->file('image'), 'sensors');
            $sensor->image = $uploadFile['url'];
        }

        return $sensor->save();
    }

    public function delete($request)
    {
        $sensor = Sensor::find($request->id);
        if ($sensor->image) {
            $this->deleteImage($sensor->image);
        }
        $sensor->delete();

        return true;
    }
}