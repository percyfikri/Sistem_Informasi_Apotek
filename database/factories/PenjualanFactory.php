<?php

namespace Database\Factories;

use App\Models\Pengguna;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penjualan>
 */
class PenjualanFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'id_customer' => Pengguna::where('status', 'customer')->inRandomOrder()->first()->id_pengguna,
      'id_apoteker' => Pengguna::where('status', 'apoteker')->inRandomOrder()->first()->id_pengguna,
      'id_dokter' => Pengguna::where('status', 'dokter')->inRandomOrder()->first()->id_pengguna,
      'tanggal' => fake()->datetime(),
    ];
  }
}
