<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('suatchieu_id')->unsigned();
            $table->foreign('suatchieu_id')->references('id')->on('suat_chieus');
            $table->integer('ghe_id')->unsigned();
            $table->foreign('ghe_id')->references('id')->on('ghes');

            $table->integer('kh_id')->unsigned();
            $table->foreign('kh_id')->references('id')->on('khach_hangs');
            $table->double('GiaVe');
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
        Schema::dropIfExists('ves');
    }
}
