<?php

namespace Database\Factories;

use App\Models\Pengguna;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jasa>
 */
class JasaFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'id_apoteker' => Pengguna::inRandomOrder()->first()->id_pengguna,
      'nama_jasa' => fake()->name(),
      'tingkatan' => fake()->randomDigit(),
      'harga' => fake()->randomNumber()
    ];
  }
}
