<?php

namespace Database\Factories;
use App\Models\Pengguna;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ResepObat>
 */
class ResepObatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_dokter' => Pengguna::where('status', 'dokter')->inRandomOrder()->first()->id_pengguna,
            'id_customer' => Pengguna::where('status', 'customer')->inRandomOrder()->first()->id_pengguna,
            'nama_resep' => fake()->name(),
            'deskripsi' => fake()->realText(),
            'tanggal'=> fake()->datetime(),
            'status' => fake()->randomElement(['racikan', 'non racikan']),
        ];
    }
}
