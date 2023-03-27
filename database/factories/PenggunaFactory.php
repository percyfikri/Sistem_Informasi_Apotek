<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengguna>
 */
class PenggunaFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'nama' => fake()->name(),
      'umur' => fake()->randomDigit(),
      'status' => fake()->randomElement(['admin', 'apoteker', 'customer', 'dokter']),
      'alamat' => fake()->realText(),
      'email' => fake()->safeEmail(),
      'password' => Hash::make('password')
    ];
  }
}
