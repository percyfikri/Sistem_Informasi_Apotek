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
    Schema::create('detail_resep', function (Blueprint $table) {
      $table->unsignedInteger('id_resep');
      $table->foreign('id_resep')->references('id_resep')->on('resep_obat')->onDelete('cascade');
      $table->unsignedInteger('id_obat');
      $table->foreign('id_obat')->references('id_obat')->on('obat')->onDelete('cascade');
      $table->unsignedInteger('id_racikan');
      $table->foreign('id_racikan')->references('id_racikan')->on('racikan')->onDelete('cascade');

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
    Schema::dropIfExists('detail_resep');
  }
};
