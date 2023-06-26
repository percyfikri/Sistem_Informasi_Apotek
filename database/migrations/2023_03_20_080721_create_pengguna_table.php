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
    Schema::create('pengguna', function (Blueprint $table) {
      $table->increments('id_pengguna');
      $table->string('nama')->index();
      $table->integer('umur')->nullable();
      $table->string('status', 10)->nullable();
      $table->string('alamat', 255)->nullable();
      $table->string('no_telepon', 16)->nullable();
      $table->string('email')->unique()->nullable();
      $table->string('password')->nullable();
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
    Schema::dropIfExists('pengguna');
  }
};
