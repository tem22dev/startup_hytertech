<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stations = [
            [1, 'Giàn số 1', 'https://tamsach.com/kcfinder/upload_new/images/cach-lam-gian-trong-rau-thuy-canh-4.jpg', 1, '2024-08-29', '2024-08-29 04:11:26', '2024-08-29 04:11:26', 2, 1],
            [2, 'Giàn số 2', 'https://tamsach.com/kcfinder/upload_new/images/cach-lam-gian-trong-rau-thuy-canh-4.jpg', 1, '2024-08-29', '2024-08-29 04:11:26', '2024-08-29 04:11:26', 2, 1],
            [3, 'Giàn số 3', 'https://tamsach.com/kcfinder/upload_new/images/cach-lam-gian-trong-rau-thuy-canh-4.jpg', 1, '2024-08-29', '2024-08-29 04:11:26', '2024-08-29 04:11:26', 2, 1],
            [4, 'Giàn số 4', 'https://tamsach.com/kcfinder/upload_new/images/cach-lam-gian-trong-rau-thuy-canh-4.jpg', 1, '2024-08-29', '2024-08-29 04:11:26', '2024-08-29 04:11:26', 2, 1],
            [5, 'Giàn số 5', 'https://tamsach.com/kcfinder/upload_new/images/cach-lam-gian-trong-rau-thuy-canh-4.jpg', 1, '2024-08-29', '2024-08-29 04:11:26', '2024-08-29 04:11:26', 2, 1],
            [6, 'Giàn số 6', 'https://tamsach.com/kcfinder/upload_new/images/cach-lam-gian-trong-rau-thuy-canh-4.jpg', 1, '2024-08-29', '2024-08-29 04:11:26', '2024-08-29 04:11:26', 2, 1],
            [7, 'Giàn số 7', 'https://tamsach.com/kcfinder/upload_new/images/cach-lam-gian-trong-rau-thuy-canh-4.jpg', 1, '2024-08-29', '2024-08-29 04:11:26', '2024-08-29 04:11:26', 2, 1],
            [8, 'Giàn số 8', 'https://tamsach.com/kcfinder/upload_new/images/cach-lam-gian-trong-rau-thuy-canh-4.jpg', 1, '2024-08-29', '2024-08-29 04:11:26', '2024-08-29 04:11:26', 2, 1],
            [9, 'Giàn số 9', 'https://tamsach.com/kcfinder/upload_new/images/cach-lam-gian-trong-rau-thuy-canh-4.jpg', 1, '2024-08-29', '2024-08-29 04:11:26', '2024-08-29 04:11:26', 2, 1],
            [10, 'Giàn số 10', 'https://tamsach.com/kcfinder/upload_new/images/cach-lam-gian-trong-rau-thuy-canh-4.jpg', 1, '2024-08-29', '2024-08-29 04:11:26', '2024-08-29 04:11:26', 2, 1],
        ];

        foreach ($stations as $station) {
            DB::table('stations')->insert([
                'id' => $station[0],
                'name' => $station[1],
                'image' => $station[2],
                'status' => $station[3],
                'setup_date' => $station[4],
                'created_at' => $station[5],
                'updated_at' => $station[6],
                'customer_id' => $station[7],
                'category_station_id' => $station[8],
            ]);
        }
    }
}
