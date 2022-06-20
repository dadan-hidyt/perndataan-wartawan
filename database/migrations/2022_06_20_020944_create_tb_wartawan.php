<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbWartawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_wartawan', function (Blueprint $table) {
            $table->id('id')->autoIncrement();
            $table->string('kode_watawan');
            $table->string('nama');
            $table->string('email');
            $table->string('telepon');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string("wilayah");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_wartawan');
    }
}
