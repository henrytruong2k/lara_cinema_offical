<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinhLuans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('binh_luans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('khachhang_id')->unsigned();
            $table->foreign('khachhang_id')->references('id')->on('khach_hangs');
            $table->integer('phim_id')->unsigned();
            $table->foreign('phim_id')->references('id')->on('phims');
            $table->timestamp('NgayBinhLuan')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('NoiDung');
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
        Schema::dropIfExists('binh_luans');
    }
}
