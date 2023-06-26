<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResepObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resep_obat')->insert([
            ['id_dokter' => 10, 'id_customer' => 9, 'nama_resep' => 'Obat Sakit Flu', 'deskripsi' => 'Obat Amoxilin', 'tanggal' => '2023-06-26', 'status' => 'racikan'],
            ['id_dokter' => 14, 'id_customer' => 11, 'nama_resep' => 'Obat Sakit Perut', 'deskripsi' => 'Obat Promag', 'tanggal' => '2023-06-10', 'status' => 'non racikan'],
            ['id_dokter' => 12, 'id_customer' => 13, 'nama_resep' => 'Obat Sakit Kepala', 'deskripsi' => 'Obat Bodrex', 'tanggal' => '2023-06-15', 'status' => 'racikan'],
            ['id_dokter' => 10, 'id_customer' => 9, 'nama_resep' => 'Obat Sakit Asam Lambung', 'deskripsi' => 'Obat Penisilin', 'tanggal' => '2023-06-18', 'status' => 'non racikan'],
            ['id_dokter' => 12, 'id_customer' => 11, 'nama_resep' => 'Obat Sakit Pinggang', 'deskripsi' => 'Obat Tetroskin', 'tanggal' => '2023-06-10', 'status' => 'racikan'],
        ]);
    }
}
