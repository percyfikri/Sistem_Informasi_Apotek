<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Penjualan;
use App\Models\Obat;
use App\Models\ResepObat;
use App\Models\Jasa;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailPenjualan>
 */
class DetailPenjualanFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'id_penjualan' => Penjualan::inRandomOrder()->first()->id_penjualan,
      'id_resep' => ResepObat::inRandomOrder()->first()->id_resep,
      'id_obat' => Obat::inRandomOrder()->first()->id_obat,
      'id_jasa' => Jasa::inRandomOrder()->first()->id_jasa,
      'kuantitas' => fake()->randomNumber(),
      'satuan' => fake()->randomNumber(),
      'subtotal' => fake()->randomNumber(),
    ];
  }
}
