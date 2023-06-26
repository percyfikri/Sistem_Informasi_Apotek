<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailPenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_penjualan')->insert([
            ['id_penjualan' => 1, 'id_resep' => 1, 'id_obat' => 1, 'id_jasa' => 1, 'kuantitas' => 4, 'satuan' => '100 mg', 'subtotal' => 30000],
            ['id_penjualan' => 2, 'id_resep' => 2, 'id_obat' => 2, 'id_jasa' => 2, 'kuantitas' => 3, 'satuan' => '100 gr', 'subtotal' => 40000],
            ['id_penjualan' => 3, 'id_resep' => 3, 'id_obat' => 3, 'id_jasa' => 3, 'kuantitas' => 5, 'satuan' => '120 mg', 'subtotal' => 20000],
            ['id_penjualan' => 4, 'id_resep' => 4, 'id_obat' => 4, 'id_jasa' => 4, 'kuantitas' => 7, 'satuan' => '100 mL', 'subtotal' => 35000],
            ['id_penjualan' => 5, 'id_resep' => 5, 'id_obat' => 5, 'id_jasa' => 5, 'kuantitas' => 3, 'satuan' => '120 gr', 'subtotal' => 20000],
            ['id_penjualan' => 6, 'id_resep' => 6, 'id_obat' => 6, 'id_jasa' => 6, 'kuantitas' => 6, 'satuan' => '100 gr', 'subtotal' => 10000],
            ['id_penjualan' => 7, 'id_resep' => 7, 'id_obat' => 7, 'id_jasa' => 7, 'kuantitas' => 4, 'satuan' => '100 mg', 'subtotal' => 15000],
            ['id_penjualan' => 8, 'id_resep' => 8, 'id_obat' => 8, 'id_jasa' => 8, 'kuantitas' => 8, 'satuan' => '100 mL', 'subtotal' => 10000],
            ['id_penjualan' => 9, 'id_resep' => 9, 'id_obat' => 9, 'id_jasa' => 9, 'kuantitas' => 5, 'satuan' => '140 gr', 'subtotal' => 20000],
            ['id_penjualan' => 10, 'id_resep' => 10, 'id_obat' => 10, 'id_jasa' => 10, 'kuantitas' => 10, 'satuan' => '100 mg', 'subtotal' => 15000]
        ]);
    }
}
