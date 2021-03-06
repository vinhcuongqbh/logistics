<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonhangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhangs', function (Blueprint $table) {
            $table->id();           
            $table->string('matracuu')->unique();
            $table->foreignId('id_nhanvienkhoitao');
            $table->foreignId('id_nhanvienquanly');
            $table->foreignId('id_khogui')->nullable();
            $table->foreignId('id_khonhan')->nullable();
            $table->foreignId('id_chuyenhang')->nullable();
            $table->foreignId('id_trangthai');
            $table->foreignId('id_hinhthucgui');
            $table->string('tennguoigui');
            $table->string('sodienthoainguoigui');
            $table->string('diachinguoigui')->nullable();
            $table->string('emailnguoigui')->nullable();
            $table->string('tennguoinhan');
            $table->string('sodienthoainguoinhan');
            $table->string('diachinguoinhan');
            $table->string('emailnguoinhan')->nullable();
            $table->bigInteger('tongchiphi');
            $table->bigInteger('chietkhau');
            $table->text('ghichu')->nullable();     
            $table->float('tongkhoiluong', 8, 2)->nullable(); 
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
        Schema::dropIfExists('donhangs');
    }
}
