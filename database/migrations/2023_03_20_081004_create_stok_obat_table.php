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
    Schema::create('stok_obat', function (Blueprint $table) {
      $table->unsignedInteger('id_obat');
      $table->foreign('id_obat')->references('id_obat')->on('obat')->onDelete('cascade');
      $table->string('satuan');
      $table->integer('kuantitas');
      $table->decimal('harga', 12, 2);
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
    Schema::dropIfExists('stok_obat');
  }
};
