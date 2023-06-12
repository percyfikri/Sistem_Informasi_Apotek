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
    Schema::create('detail_penjualan', function (Blueprint $table) {
      $table->unsignedInteger('id_penjualan');
      $table->foreign('id_penjualan')->references('id_penjualan')->on('penjualan')->onDelete('cascade');
      $table->unsignedInteger('id_resep')->nullable();
      $table->foreign('id_resep')->references('id_resep')->on('resep_obat')->onDelete('cascade');
      $table->unsignedInteger('id_obat')->nullable();
      $table->foreign('id_obat')->references('id_obat')->on('obat')->onDelete('cascade');
      $table->unsignedInteger('id_jasa')->nullable();
      $table->foreign('id_jasa')->references('id_jasa')->on('jasa')->onDelete('cascade');
      $table->integer('kuantitas');
      $table->string('satuan', 20);
      $table->decimal('subtotal', 12, 2);
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
    Schema::dropIfExists('detail_penjualan');
  }
};
