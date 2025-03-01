<?php

namespace App\Services\Admin;

use App\Enums\StatusEnum;
use App\Traits\ImageTrait;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerService
{
    use ImageTrait;

    public function getList()
    {
        return Customer::select(Customer::getSelectedAttributes())
            ->orderBy('id', 'desc');
    }

    public function store($request)
    {
        $password = Hash::make($request->password);
        $status = $request->status ? StatusEnum::ACTIVE->value : StatusEnum::HIDDEN->value;

        $avatar = null;
        if ($request->hasFile('avatar')) {
            $avatarURL = $this->storeImage($request->file('avatar'), 'avatars', true);
            $avatar = $avatarURL['avatar'];
        }

        $result = Customer::create([
            'full_name' => $request->full_name,
            'tel' => $request->tel,
            'email' => $request->email,
            'status' => $status,
            'gender' => $request->gender,
            'password' => $password,
            'city_id' => (int) $request->city,
            'district_id' => (int) $request->district,
            'ward_id' => (int) $request->ward,
            'address' => $request->address,
            'avatar' => $avatar,
        ]);

        return $result;
    }

    public function getCustomerUpdate($request)
    {
        return Customer::where('id', $request->id)
            ->firstOrFail();
    }

    public function update($request)
    {
        $customer = Customer::find($request->id);
        $customer->full_name = $request->full_name;
        $customer->email = $request->email;
        $customer->tel = $request->tel;
        $customer->status = $request->status ? StatusEnum::ACTIVE->value : StatusEnum::HIDDEN->value;
        $customer->gender = $request->gender;
        $customer->city_id = (int) $request->city;
        $customer->district_id = (int) $request->district;
        $customer->ward_id = (int) $request->ward;
        $customer->address = $request->address;

        if ($request->password) {
            $customer->password = Hash::make($request->password);
        }
        if ($request->file('avatar')) {
            if ($customer->avatar) {
                $this->deleteImage($customer->avatar);
            }
            $uploadFile = $this->storeImage($request->file('avatar'), 'avatars', true);
            $customer->avatar = $uploadFile['avatar'];
        }

        return $customer->save();
    }

    public function delete($request)
    {
        $customer = Customer::find($request->id);
        if ($customer->avatar) {
            $this->deleteImage($customer->avatar);
        }
        $customer->delete();

        return true;
    }

    public function updateStatus($request)
    {
        $customer = Customer::find($request->id);
        $customer->status = $request->status;
        $customer->save();

        return $customer;
    }

    public function getCountCustomerValue()
    {
        $customerCount = Customer::count();
        return $customerCount;
    }
}
