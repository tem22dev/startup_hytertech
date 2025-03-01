<?php

namespace App\Services\Admin;

use App\Enums\StatusEnum;
use App\Enums\UserTypeEnum;
use App\Events\UpdateChart;
use App\Models\SensorValue;
use App\Traits\ImageTrait;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountService
{
    use ImageTrait;

    public function getList()
    {
        return User::select(User::getSelectedAttributes())
            ->where('user_type', UserTypeEnum::MEMBER_ADMIN->value)
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

        $result = User::create([
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
            'user_type' => UserTypeEnum::MEMBER_ADMIN,
        ]);

        

        return $result;
    }

    public function getUserUpdate($request)
    {
        return User::where('id', $request->id)
            ->firstOrFail();
    }

    public function update($request)
    {

        $account = User::find($request->id);
        $account->full_name = $request->full_name;
        $account->email = $request->email;
        $account->tel = $request->tel;
        $account->status = $request->status ? StatusEnum::ACTIVE->value : StatusEnum::HIDDEN->value;
        $account->gender = $request->gender;
        $account->city_id = (int) $request->city;
        $account->district_id = (int) $request->district;
        $account->ward_id = (int) $request->ward;
        $account->address = $request->address;

        if ($request->password) {
            $account->password = Hash::make($request->password);
        }
        if ($request->file('avatar')) {
            if ($account->avatar) {
                $this->deleteImage($account->avatar);
            }
            $uploadFile = $this->storeImage($request->file('avatar'), 'avatars', true);
            $account->avatar = $uploadFile['avatar'];
        }

        return $account->save();
    }

    public function delete($request)
    {
        $account = User::find($request->id);
        if ($account->avatar) {
            $this->deleteImage($account->avatar);
        }
        $account->delete();

        return true;
    }

    public function updateStatus($request)
    {
        $account = User::find($request->id);
        $account->status = $request->status;
        $account->save();

        return $account;
    }

    public function updatePassword($request)
    {
        $user = Auth::user();
        $user->password = Hash::make($request->input('new_password'));
        if ($user->save()) {
            return true;
        };

        return false;
    }
}