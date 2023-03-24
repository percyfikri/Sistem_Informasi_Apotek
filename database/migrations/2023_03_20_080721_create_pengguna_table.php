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
      $table->string('umur');
      $table->string('status');
      $table->string('alamat');
      $table->string('email')->unique();
      $table->string('password');
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
