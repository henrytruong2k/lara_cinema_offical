<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhimDienvien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phim_dienvien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('phim_id')->unsigned();
            $table->integer('dienvien_id')->unsigned();

            $table->foreign('phim_id')->references('id')->on('phims')->onDelete('cascade');
            $table->foreign('dienvien_id')->references('id')->on('dien_viens')->onDelete('cascade');
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
        Schema::dropIfExists('phim_dienvien');
    }
}
