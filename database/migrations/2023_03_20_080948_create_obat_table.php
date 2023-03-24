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
    Schema::create('obat', function (Blueprint $table) {
      $table->increments('id_obat');
      $table->string('nama_obat')->index();
      $table->string('jenis_obat');
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
    Schema::dropIfExists('obat');
  }
};
