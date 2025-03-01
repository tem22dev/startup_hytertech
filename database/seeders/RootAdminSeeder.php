<?php

namespace Database\Seeders;

use App\Enums\UserTypeEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RootAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            [
                'email' => 'admin@gmail.com',
            ],
            [
                'full_name' => 'Root Admin',
                'email' => 'admin@gmail.com',
                'tel' => '0123456789',
                'city_id' => 1,
                'district_id' => 1,
                'ward_id' => 1,
                'address' => 'KG',
                'user_type' => UserTypeEnum::ROOT_ADMIN->value,
                'password' => Hash::make('root_admin_9999'),
            ]
        );
    }
}
