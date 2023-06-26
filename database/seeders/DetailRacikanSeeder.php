<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailRacikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_racikan')->insert([
            ['id_racikan' => 1, 'id_obat' => 1, 'kuantitas' => 12, 'satuan' => '250 gr'],
            ['id_racikan' => 2, 'id_obat' => 2, 'kuantitas' => 10, 'satuan' => '100 gr'],
            ['id_racikan' => 3, 'id_obat' => 3, 'kuantitas' => 5, 'satuan' => '120 mL'],
            ['id_racikan' => 4, 'id_obat' => 4, 'kuantitas' => 7, 'satuan' => '150 gr'],
            ['id_racikan' => 5, 'id_obat' => 5, 'kuantitas' => 5, 'satuan' => '120 gr'],
            ['id_racikan' => 6, 'id_obat' => 6, 'kuantitas' => 15, 'satuan' => '200 mL'],
            ['id_racikan' => 7, 'id_obat' => 7, 'kuantitas' => 8, 'satuan' => '100 mL'],
            ['id_racikan' => 8, 'id_obat' => 8, 'kuantitas' => 10, 'satuan' => '140 gr'],
            ['id_racikan' => 9, 'id_obat' => 9, 'kuantitas' => 6, 'satuan' => '200 gr'],
            ['id_racikan' => 10, 'id_obat' => 10, 'kuantitas' => 4, 'satuan' => '300 mL']
        ]);
    }
}
