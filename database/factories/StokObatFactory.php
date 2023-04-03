<?php

namespace Database\Factories;
use App\Models\Obat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StokObat>
 */
class StokObatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_obat' => Obat::inRandomOrder()->first()->id_obat,
            'satuan' => fake()->randomNumber(),
            'kuantitas' => fake()->randomNumber(),
            'harga' => fake()->randomNumber(),
        ];
    }
}
