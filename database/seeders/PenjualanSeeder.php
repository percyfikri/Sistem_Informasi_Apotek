<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penjualan')->insert([
            ['id_customer' => 9 , 'id_apoteker' => 1, 'id_dokter' => 10, 'tanggal' => '2023-06-02'],
            ['id_customer' => 11 , 'id_apoteker' => 3, 'id_dokter' => 10, 'tanggal' => '2023-06-06'],
            ['id_customer' => 13 , 'id_apoteker' => 5, 'id_dokter' => 12, 'tanggal' => '2023-06-10'],
            ['id_customer' => 9 , 'id_apoteker' => 3, 'id_dokter' => 14, 'tanggal' => '2023-06-12'],
            ['id_customer' => 11 , 'id_apoteker' => 1, 'id_dokter' => 12, 'tanggal' => '2023-06-14']
        ]);
    }
}
