<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Racikan;
use App\Models\Obat;
use App\Models\ResepObat;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailResep>
 */
class DetailResepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_resep' => ResepObat::inRandomOrder()->first()->id_resep,
            'id_obat' => Obat::inRandomOrder()->first()->id_obat,
            'id_racikan' => Racikan::inRandomOrder()->first()->id_racikan,
            'kuantitas' => fake()->randomNumber(),
            'satuan' => fake()->randomNumber(),
            'harga' => fake()->randomNumber(),
        ];
    }
}
