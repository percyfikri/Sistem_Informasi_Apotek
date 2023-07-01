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
    Schema::create('resep_obat', function (Blueprint $table) {
      $table->increments('id_resep');
      $table->unsignedInteger('id_dokter')->nullable();
      $table->foreign('id_dokter')->references('id_pengguna')->on('pengguna')->onDelete('cascade');
      $table->unsignedInteger('id_customer')->nullable();
      $table->foreign('id_customer')->references('id_pengguna')->on('pengguna')->onDelete('cascade');
      $table->string('nama_resep');
      $table->string('deskripsi');
      $table->date('tanggal');
      $table->string('status');
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
    Schema::dropIfExists('resep_obat');
  }
};
