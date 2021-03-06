<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class dongiatinhtheosoluongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dongiatinhtheosoluongs')->insert([
            [
                'tenmathang' => 'Airpods',
                'dongiaduongkhong' => 215000,
                'dongiaduongbien' => 105000,
            ],
            [
                'tenmathang' => 'Apple Watch',
                'dongiaduongkhong' => 330000,
                'dongiaduongbien' => 149000,
            ],
            [
                'tenmathang' => 'iPhone, iPad',
                'dongiaduongkhong' => 630000,
                'dongiaduongbien' => 215000,
            ],
            [
                'tenmathang' => 'Laptop',
                'dongiaduongkhong' => 0,
                'dongiaduongbien' => 320000,
            ],
            // [
            //     'tenmathang' => 'iPhone từ X đến dưới 12',
            //     'dongiaduongkhong' => 950000,
            //     'dongiaduongbien' => 900000,
            // ],
            // [
            //     'tenmathang' => 'iPad dưới 60.000 Yên',
            //     'dongiaduongkhong' => 750000,
            //     'dongiaduongbien' => 700000,
            // ],
            // [
            //     'tenmathang' => 'iPad từ 60.000 Yên trở lên',
            //     'dongiaduongkhong' => 950000,
            //     'dongiaduongbien' => 900000,
            // ],
            // [
            //     'tenmathang' => 'Laptop/Macbook dưới 4kg',
            //     'dongiaduongkhong' => 1500000,
            //     'dongiaduongbien' => 1450000,
            // ],
            // [
            //     'tenmathang' => 'Laptop/Macbook từ 4kg trở lên',
            //     'dongiaduongkhong' => 0,
            //     'dongiaduongbien' => 0,
            // ],
            // [
            //     'tenmathang' => 'Thuốc lá',
            //     'dongiaduongkhong' => 380000,
            //     'dongiaduongbien' => 330000,
            // ],
            // [
            //     'tenmathang' => 'Thuốc lá điện tử',
            //     'dongiaduongkhong' => 0,
            //     'dongiaduongbien' => 0,
            // ],
            // [
            //     'tenmathang' => 'Linh kiện máy tính',
            //     'dongiaduongkhong' => 250000,
            //     'dongiaduongbien' => 200000,
            // ],
        ]);
    }
}
