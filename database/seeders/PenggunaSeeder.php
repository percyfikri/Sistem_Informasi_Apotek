<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengguna')->insert([
            'nama' => 'Falendika',
            'umur' => '20',
            'status' => 'apoteker',
            'alamat' => 'Malang',
            'email' => 'len@len.com',
            'password' => bcrypt('12345')
        ]);
    }
}
