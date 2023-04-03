<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Racikan>
 */
class RacikanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_racikan' => fake()->name(),
            'harga' => fake()->randomNumber(),
            'catatan' => fake()->realText(),
        ];
    }
}
