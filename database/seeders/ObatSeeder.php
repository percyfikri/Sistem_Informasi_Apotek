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
            'nama_obat'=>'Bodrex',
            'jenis_obat'=>'Pil',
        ]);
        DB::table('obat')->insert([
            'nama_obat'=>'Amoxilin',
            'jenis_obat'=>'Pil',
        ]);
        DB::table('obat')->insert([
            'nama_obat'=>'Panadol',
            'jenis_obat'=>'Cair',
        ]);
    }
}
