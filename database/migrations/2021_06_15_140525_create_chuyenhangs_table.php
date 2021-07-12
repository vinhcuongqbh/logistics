<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChuyenhangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chuyenhangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_nhanvienquanly');
            $table->foreignId('id_khogui');
            $table->foreignId('id_khonhan');
            $table->foreignId('id_trangthai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chuyenhangs');
    }
}