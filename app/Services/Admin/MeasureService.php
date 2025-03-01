<?php

namespace App\Services\Admin;

use App\Models\Measure;

class MeasureService
{
    public function getList()
    {
        return Measure::select(Measure::getSelectedAttributes())
            ->orderBy('id', 'desc');
    }

    public function getListName()
    {
        return Measure::select(Measure::getListNameSelectedAttributes())
            ->get();
    }

    public function store($request)
    {
        $result = Measure::create([
            'name' => $request->name,
            'icon' => $request->icon,
            'description' => $request->description,
        ]);

        return $result;
    }

    public function getData($request)
    {
        return Measure::where('id', $request->id)
            ->get();
    }

    public function update($request)
    {
        $measure = Measure::find($request->id);
        $measure->name = $request->name;
        $measure->icon = $request->icon;
        $measure->description = $request->description;

        return $measure->save();
    }

    public function delete($request)
    {
        $account = Measure::find($request->id);
        $account->delete();

        return true;
    }
}