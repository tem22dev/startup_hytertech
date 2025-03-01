<?php

namespace App\Services\Mobile;

use App\Enums\StatusEnum;
use App\Models\Customer;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Hash;

class CustomerService
{
    use ImageTrait;

    public function updateProfile($request) {
        $customer = Customer::find($request->id);
        $customer->full_name = $request->full_name;
        $customer->email = $request->email;
        $customer->tel = $request->tel;
        $customer->gender = $request->gender;
        $customer->city_id = (int) $request->city_id;
        $customer->district_id = (int) $request->district_id;
        $customer->ward_id = (int) $request->ward_id;
        $customer->address = $request->address;

        return $customer->save();
    }

    public function updateAvatar($request) {
        $customer = Customer::find($request->id);

        if ($request->hasFile('avatar')) {
            if ($customer->avatar) {
                $this->deleteImage($customer->avatar);
            }

            $uploadFile = $this->storeImage($request->file('avatar'), 'avatars', true);
            $customer->avatar = $uploadFile['avatar'];
        }

        return $customer->save();
    }
}