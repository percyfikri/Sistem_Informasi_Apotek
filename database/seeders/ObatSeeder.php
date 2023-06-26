<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('obat')->insert([
            ['nama_obat' => 'Amoxilin', 'jenis_obat' => 'Kapsul'],
            ['nama_obat' => 'Panadol', 'jenis_obat' => 'Pil'],
            ['nama_obat' => 'Antimo', 'jenis_obat' => 'Kapsul'],
            ['nama_obat' => 'Makrolida', 'jenis_obat' => 'Tablet'],
            ['nama_obat' => 'Quinolon', 'jenis_obat' => 'Sirup'],
            ['nama_obat' => 'Tetraskilin', 'jenis_obat' => 'Kapsul'],
            ['nama_obat' => 'Penisilin', 'jenis_obat' => 'Pil'],
            ['nama_obat' => 'Ampicilin', 'jenis_obat' => 'Kapsul'],
            ['nama_obat' => 'Tobramycin', 'jenis_obat' => 'Tablet'],
            ['nama_obat' => 'Azithromycin', 'jenis_obat' => 'Pil'],
        ]);
    }
}
