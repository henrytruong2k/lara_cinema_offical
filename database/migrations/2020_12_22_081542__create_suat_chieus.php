<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuatChieus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suat_chieus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('phim_id')->unsigned();
            $table->foreign('phim_id')->references('id')->on('phims');
            $table->integer('giochieu_id')->unsigned();
            $table->foreign('giochieu_id')->references('id')->on('gio_chieus');
            // $table->integer('rap_id')->unsigned();
            // $table->foreign('rap_id')->references('id')->on('raps');
            $table->integer('phong_id')->unsigned();
            $table->foreign('phong_id')->references('id')->on('phongs');
            $table->double('GiaSuatChieu');
            $table->date('NgayChieu');
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
        //
        Schema::dropIfExists('suat_chieus');
    }
}
