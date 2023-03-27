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
    Schema::create('jasa', function (Blueprint $table) {
      $table->increments('id_jasa');
      $table->unsignedInteger('id_apoteker');
      $table->foreign('id_apoteker')->references('id_pengguna')->on('pengguna')->onDelete('cascade');
      $table->string('nama_jasa');
      $table->string('tingkatan');
      $table->decimal('harga', 12, 2);
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('jasa');
  }
};
