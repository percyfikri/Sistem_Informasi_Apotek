<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {

    $this->call(
      [
        ObatSeeder::class,
        StokObatSeeder::class,
        PenggunaSeeder::class,
        JasaSeeder::class,
        // PenjualanSeeder::class,
        // RacikanSeeder::class,
        // ResepObatSeeder::class,
        // DetailPenjualanSeeder::class,
        // DetailRacikanSeeder::class,
        // DetailResepSeeder::class,
      ]
    );

    // \App\Models\Pengguna::factory(100)->create();
    // \App\Models\Jasa::factory(100)->create();
    // \App\Models\Obat::factory(20)->create();
    // \App\Models\ResepObat::factory(20)->create();
    // \App\Models\Racikan::factory(20)->create();
    // \App\Models\StokObat::factory(20)->create();
    // \App\Models\Penjualan::factory(20)->create();
    // \App\Models\DetailPenjualan::factory(10)->create();
    // \App\Models\DetailRacikan::factory(10)->create();
    // \App\Models\DetailResep::factory(10)->create();

    // \App\Models\User::factory(10)->create();

    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);

  }
}
