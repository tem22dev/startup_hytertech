<?php

namespace Database\Seeders;

use App\Models\Sensor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class SensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sensors = [
            ['id' => 1, 'name' => 'Cảm biến nhiệt độ số 1', 'type' => 1, 'image' => 'https://bizweb.dktcdn.net/100/522/662/products/sen0161-v2-03cee752e6bb436390898549a870f2ba-1024x1024.jpg?v=1723077683320'],
            ['id' => 2, 'name' => 'Cảm biến nhiệt độ số 2', 'type' => 1, 'image' => 'https://bizweb.dktcdn.net/100/522/662/products/sen0161-v2-03cee752e6bb436390898549a870f2ba-1024x1024.jpg?v=1723077683320'],
            ['id' => 3, 'name' => 'Cảm biến nhiệt độ số 3', 'type' => 1, 'image' => 'https://bizweb.dktcdn.net/100/522/662/products/sen0161-v2-03cee752e6bb436390898549a870f2ba-1024x1024.jpg?v=1723077683320'],
            ['id' => 4, 'name' => 'Cảm biến nhiệt độ số 4', 'type' => 1, 'image' => 'https://bizweb.dktcdn.net/100/522/662/products/sen0161-v2-03cee752e6bb436390898549a870f2ba-1024x1024.jpg?v=1723077683320'],
            ['id' => 5, 'name' => 'Cảm biến pH số 1', 'type' => 1, 'image' => 'https://bizweb.dktcdn.net/100/522/662/products/sen0161-v2-03cee752e6bb436390898549a870f2ba-1024x1024.jpg?v=1723077683320'],
            ['id' => 6, 'name' => 'Cảm biến pH số 2', 'type' => 1, 'image' => 'https://bizweb.dktcdn.net/100/522/662/products/sen0161-v2-03cee752e6bb436390898549a870f2ba-1024x1024.jpg?v=1723077683320'],
            ['id' => 7, 'name' => 'Cảm biến pH số 3', 'type' => 1, 'image' => 'https://bizweb.dktcdn.net/100/522/662/products/sen0161-v2-03cee752e6bb436390898549a870f2ba-1024x1024.jpg?v=1723077683320'],
            ['id' => 8, 'name' => 'Cảm biến pH số 4', 'type' => 1, 'image' => 'https://bizweb.dktcdn.net/100/522/662/products/sen0161-v2-03cee752e6bb436390898549a870f2ba-1024x1024.jpg?v=1723077683320'],
            ['id' => 9, 'name' => 'Cảm biến eC số 1', 'type' => 1, 'image' => 'https://bizweb.dktcdn.net/100/522/662/products/sen0161-v2-03cee752e6bb436390898549a870f2ba-1024x1024.jpg?v=1723077683320'],
            ['id' => 10, 'name' => 'Cảm biến eC số 2', 'type' => 1, 'image' => 'https://bizweb.dktcdn.net/100/522/662/products/sen0161-v2-03cee752e6bb436390898549a870f2ba-1024x1024.jpg?v=1723077683320'],
            ['id' => 11, 'name' => 'Cảm biến eC số 3', 'type' => 1, 'image' => 'https://bizweb.dktcdn.net/100/522/662/products/sen0161-v2-03cee752e6bb436390898549a870f2ba-1024x1024.jpg?v=1723077683320'],
            ['id' => 12, 'name' => 'Cảm biến eC số 4', 'type' => 1, 'image' => 'https://bizweb.dktcdn.net/100/522/662/products/sen0161-v2-03cee752e6bb436390898549a870f2ba-1024x1024.jpg?v=1723077683320'],
        ];

        DB::table('sensors')->insert($sensors);
    }
}
