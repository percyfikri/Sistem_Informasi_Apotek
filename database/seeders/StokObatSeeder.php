<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stok_obat')->insert([
            ['id_obat' => 1, 'satuan' => '100 gr', 'kuantitas' => '20', 'harga' => 10000],
            ['id_obat' => 2, 'satuan' => '100 mL', 'kuantitas' => '25', 'harga' => 12000],
            ['id_obat' => 3, 'satuan' => '100 mg', 'kuantitas' => '20', 'harga' => 14000],
            ['id_obat' => 4, 'satuan' => '200 mL', 'kuantitas' => '25', 'harga' => 17000],
            ['id_obat' => 5, 'satuan' => '100 gr', 'kuantitas' => '10', 'harga' => 13000],
            ['id_obat' => 6, 'satuan' => '100 mg', 'kuantitas' => '6', 'harga' => 11500],
            ['id_obat' => 7, 'satuan' => '100 mL', 'kuantitas' => '13', 'harga' => 15000],
            ['id_obat' => 8, 'satuan' => '100 mg', 'kuantitas' => '12', 'harga' => 12000]
        ]);
    }
}
