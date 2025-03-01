<?php

namespace App\Services\Admin;

use App\Models\CategoryStation;
use App\Traits\ImageTrait;

class CategoryStationService
{
    public function getList()
    {
        return CategoryStation::select(CategoryStation::getSelectedAttributes())
            ->withCount(['products'])
            ->orderBy('id', 'desc');
    }

    public function store($request)
    {
        $image = ImageTrait::storeImage(
            $request->file('image'),
            'product_categories'
        );

        return CategoryStation::create([
            'name' => $request->name,
            'image' => $image['url'],
        ]);
    }

    public function getData($request)
    {
        return CategoryStation::where('id', $request->id)
            ->get();
    }

    public function update($request)
    {
        $category = CategoryStation::find($request->id);

        // When update image
        if ($request->hasFile('image')) {
            ImageTrait::deleteImage($category->image);
            $image = ImageTrait::storeImage(
                $request->file('image'),
                'product_categories'
            );

            $category->image = $image['url'];
        }

        return $category->save();
    }

    public function delete($request)
    {
        $category = CategoryStation::find($request->id);
        ImageTrait::deleteImage($category->image);
        $category->delete();

        return true;
    }
}