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
        $donhang = Donhang::factory()->count(100)->create();
    }
}
