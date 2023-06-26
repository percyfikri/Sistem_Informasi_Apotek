<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jasa')->insert([
            ['id_apoteker' => 1, 'nama_jasa' => 'Dio Supandar', 'tingkatan' => 3, 'harga' => 30000],
            ['id_apoteker' => 2, 'nama_jasa' => 'Andi Mahito', 'tingkatan' => 2, 'harga' => 20000],
            ['id_apoteker' => 3, 'nama_jasa' => 'Indah Rahmawanti', 'tingkatan' => 1, 'harga' => 10000],
            ['id_apoteker' => 4, 'nama_jasa' => 'Sintia Wulandari', 'tingkatan' => 2, 'harga' => 20000]
        ]);
    }
}
