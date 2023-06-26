<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RacikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('racikan')->insert([
            ['nama_racikan' => 'Obat Sakit Perut', 'harga' => '12000', 'Catatan' => 'Minum 3x sehari'],
            ['nama_racikan' => 'Obat Sakit Kepala', 'harga' => '10000', 'Catatan' => 'Minum 2x sehari'],
            ['nama_racikan' => 'Obat Sakit Asma', 'harga' => '20000', 'Catatan' => 'Minum 3x sehari'],
            ['nama_racikan' => 'Obat Sakit Flu', 'harga' => '13000', 'Catatan' => 'Minum 2x sehari'],
            ['nama_racikan' => 'Obat Sakit GIgi', 'harga' => '20000', 'Catatan' => 'Minum 3x sehari'],
            ['nama_racikan' => 'Obat Sakit Maag', 'harga' => '10000', 'Catatan' => 'Minum 2x sehari'],
            ['nama_racikan' => 'Obat Sakit Pinggang', 'harga' => '12000', 'Catatan' => 'Minum 3x sehari'],
            ['nama_racikan' => 'Obat Sakit Tenggorokan', 'harga' => '14000', 'Catatan' => 'Minum 2x sehari'],
            ['nama_racikan' => 'Obat Sakit Asam Urat', 'harga' => '15000', 'Catatan' => 'Minum 3x sehari'],
            ['nama_racikan' => 'Obat Sakit Asam Lambung', 'harga' => '16000', 'Catatan' => 'Minum 2x sehari']
        ]);
    }
}
