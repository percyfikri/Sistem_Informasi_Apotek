<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Racikan;
use App\Models\Obat;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailRacikan>
 */
class DetailRacikanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_racikan' => Racikan::inRandomOrder()->first()->id_racikan,
            'id_obat' => Obat::inRandomOrder()->first()->id_obat,
            'satuan' => fake()->randomNumber(),
            'kuantitas' => fake()->randomNumber(),
        ];
    }
}
