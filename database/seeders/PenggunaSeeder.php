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
      ['nama' => 'Falendika', 'umur' => 20, 'no_telepon' => '08125123456', 'status' => 'apoteker', 'alamat' => 'Malang', 'email' => 'len@len.com', 'password' => bcrypt('12345')],
      ['nama' => 'Andi Mahito', 'umur' => 23, 'no_telepon' => '08125123456', 'status' => 'apoteker', 'alamat' => 'Jombang', 'email' => 'andi@andi.com', 'password' => bcrypt('12345')],
      ['nama' => 'Putri Melati', 'umur' => 20, 'no_telepon' => '08125123456', 'status' => 'apoteker', 'alamat' => 'Surabaya', 'email' => 'putri@putri.com', 'password' => bcrypt('12345')],
      ['nama' => 'Fitri', 'umur' => 25, 'no_telepon' => '08125123456', 'status' => 'apoteker', 'alamat' => 'Bandung', 'email' => 'fitri@fitri.com', 'password' => bcrypt('12345')],
      ['nama' => 'Andini', 'umur' => 21, 'no_telepon' => '08125123456', 'status' => 'apoteker', 'alamat' => 'Surakarta', 'email' => 'andini@andini.com', 'password' => bcrypt('12345')],
      ['nama' => 'Santi', 'umur' => 19, 'no_telepon' => '08125123456', 'status' => 'apoteker', 'alamat' => 'Bojonegoro', 'email' => 'santi@santi.com', 'password' => bcrypt('12345')],
      ['nama' => 'Gita', 'umur' => 24, 'no_telepon' => '08125123456', 'status' => 'apoteker', 'alamat' => 'Malang', 'email' => 'gita@gita.com', 'password' => bcrypt('12345')],
      ['nama' => 'Deni', 'umur' => 25, 'no_telepon' => '08125123456', 'status' => 'apoteker', 'alamat' => 'Tumpang', 'email' => 'deni@deni.com', 'password' => bcrypt('12345')],
      ['nama' => 'Ferdi', 'umur' => 22, 'no_telepon' => '08125123456', 'status' => 'customer', 'alamat' => 'Surabaya', 'email' => 'ferdi@ferdi.com', 'password' => bcrypt('12345')],
      ['nama' => 'Dinda', 'umur' => 24, 'no_telepon' => '08125123456', 'status' => 'dokter', 'alamat' => 'Lumajang', 'email' => 'dinda@dinda.com', 'password' => bcrypt('12345')],
      ['nama' => 'Citra', 'umur' => 25, 'no_telepon' => '08125123456', 'status' => 'customer', 'alamat' => 'Jakarta', 'email' => 'citra@citra.com', 'password' => bcrypt('12345')],
      ['nama' => 'Gian', 'umur' => 27, 'no_telepon' => '08125123456', 'status' => 'dokter', 'alamat' => 'Donomulyo', 'email' => 'gian@gian.com', 'password' => bcrypt('12345')],
      ['nama' => 'Alvito', 'umur' => 24, 'no_telepon' => '08125123456', 'status' => 'customer', 'alamat' => 'Maluku', 'email' => 'alvito@alvito.com', 'password' => bcrypt('12345')],
      ['nama' => 'Risky', 'umur' => 29, 'no_telepon' => '08125123456', 'status' => 'dokter', 'alamat' => 'Lumajang', 'email' => 'risky@risky.com', 'password' => bcrypt('12345')]
    ]);
  }
}
