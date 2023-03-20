<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->increments('id_penjualan');
            $table->unsignedInteger('id_customer');
            $table->foreign('id_customer')->references('id_pengguna')->on('pengguna')->onDelete('cascade');
            $table->unsignedInteger('id_apoteker');
            $table->foreign('id_apoteker')->references('id_pengguna')->on('pengguna')->onDelete('cascade');
            $table->unsignedInteger('id_jasa');
            $table->foreign('id_jasa')->references('id_jasa')->on('jasa')->onDelete('cascade');
            $table->datetime('tanggal');
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
        Schema::dropIfExists('penjualan');
    }
};
