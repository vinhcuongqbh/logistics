<?php

namespace Database\Seeders;

use App\Models\Donhang;
use Illuminate\Database\Seeder;

class DonhangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $donhang = Donhang::factory()->count(50)->create([
            'id_nhanvienquanly' => 2,
            'id_trangthai' => 2,
            'id_khogui' => 2,
        ]);
        $donhang = Donhang::factory()->count(50)->create([
            'id_nhanvienquanly' => 3,
            'id_trangthai' => 2,
            'id_khogui' => 3,
        ]);
        $donhang = Donhang::factory()->count(50)->create([
            'id_nhanvienquanly' => 4,
            'id_trangthai' => 2,
            'id_khogui' => 4,
        ]);
        $donhang = Donhang::factory()->count(50)->create([
            'id_nhanvienquanly' => 5,
            'id_trangthai' => 2,
            'id_khogui' => 5,
        ]);
    }
}
