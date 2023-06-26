<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailResepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_resep')->insert([
            ['id_resep' => 1, 'id_obat' => 1, 'id_racikan' => 1, 'kuantitas' => 10, 'satuan' => '100 gr', 'harga' => 12000],
            ['id_resep' => 2, 'id_obat' => 2, 'id_racikan' => 2, 'kuantitas' => 12, 'satuan' => '100 mL', 'harga' => 14000],
            ['id_resep' => 3, 'id_obat' => 3, 'id_racikan' => 3, 'kuantitas' => 15, 'satuan' => '100 mg', 'harga' => 13000],
            ['id_resep' => 4, 'id_obat' => 4, 'id_racikan' => 4, 'kuantitas' => 10, 'satuan' => '100 gr', 'harga' => 10000],
            ['id_resep' => 5, 'id_obat' => 5, 'id_racikan' => 5, 'kuantitas' => 7, 'satuan' => '100 mL', 'harga' => 20000],
            ['id_resep' => 6, 'id_obat' => 6, 'id_racikan' => 6, 'kuantitas' => 4, 'satuan' => '100 gr', 'harga' => 10000],
            ['id_resep' => 7, 'id_obat' => 7, 'id_racikan' => 7, 'kuantitas' => 12, 'satuan' => '150 gr', 'harga' => 15000],
            ['id_resep' => 8, 'id_obat' => 8, 'id_racikan' => 8, 'kuantitas' => 14, 'satuan' => '200 gr', 'harga' => 17000],
            ['id_resep' => 9, 'id_obat' => 9, 'id_racikan' => 9, 'kuantitas' => 5, 'satuan' => '100 gr', 'harga' => 10000],
            ['id_resep' => 10, 'id_obat' => 10, 'id_racikan' => 10, 'kuantitas' => 13, 'satuan' => '250 gr', 'harga' => 20000]
        ]);
    }
}
