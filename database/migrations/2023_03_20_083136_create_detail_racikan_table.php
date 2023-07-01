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
    Schema::create('detail_racikan', function (Blueprint $table) {
      $table->increments('id_detail_racikan');
      $table->unsignedInteger('id_racikan')->nullable();
      $table->foreign('id_racikan')->references('id_racikan')->on('racikan')->onDelete('cascade');
      $table->unsignedInteger('id_obat')->nullable();
      $table->foreign('id_obat')->references('id_obat')->on('obat')->onDelete('cascade');
      $table->integer('kuantitas');
      $table->string('satuan', 20);
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
    Schema::dropIfExists('detail_racikan');
  }
};
