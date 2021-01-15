<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhanViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhan_viens', function (Blueprint $table) {

                $table->bigIncrements('MaNV');
                $table->string('HoTen');  //
                $table->string('Anh')->nullable();   //

                $table->unsignedBigInteger('ChucVu_ID');  //
                $table->string('TenTK',50)->unique(); //
                $table->string('password');  //

                $table->date('NgSinh')->nullable();
                $table->string('DiaChi')->nullable();
                $table->string('SDT',15)->unique();
                $table->string('Email',100)->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->tinyInteger('status');

                $table->rememberToken();
                $table->timestamps();

                $table->foreign('ChucVu_ID')->references('MaCV')->on('chuc_vus');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhan_viens');
    }
}
