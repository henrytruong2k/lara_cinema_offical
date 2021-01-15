<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGioChieus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gio_chieus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('loaitgchieu_id')->unsigned();
            $table->foreign('loaitgchieu_id')->references('id')->on('loai_tg_chieus');
            $table->time('GioBatDau');
            $table->integer('TrangThai')->default(1);
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
        Schema::dropIfExists('gio_chieus');
    }
}
