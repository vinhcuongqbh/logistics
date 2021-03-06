<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThongtincongtysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thongtincongtys', function (Blueprint $table) {
            $table->id();
            $table->string('tencongty');
            $table->string('sodienthoai')->nullable();
            $table->string('diachi')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('slogan')->nullable();
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
        Schema::dropIfExists('thongtincongtys');
    }
}
