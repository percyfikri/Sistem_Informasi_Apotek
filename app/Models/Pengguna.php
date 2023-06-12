<?php

namespace App\Models;

use App\Models\Jasa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengguna extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $table = 'pengguna';
  protected $primaryKey = 'id_pengguna';

  protected $fillable = [
    'nama',
    'email',
    'jk',
    'umur',
    'status',
    'alamat',
  ];

  protected $hidden = [
    'password',
  ];

  public function jasa()
  {
    return $this->hasMany(Jasa::class, 'id_apoteker', 'id_pengguna');
  }

  public function apoteker_penjualan()
  {
    return $this->hasMany(Penjualan::class, 'id_apoteker', 'id_pengguna');
  }
  public function dokter_penjualan()
  {
    return $this->hasMany(Penjualan::class, 'id_dokter', 'id_pengguna');
  }
  public function customer_penjualan()
  {
    return $this->hasMany(Penjualan::class, 'id_customer', 'id_pengguna');
  }
  public function dokter_resep()
  {
    return $this->hasMany(ResepObat::class, 'id_dokter', 'id_pengguna');
  }
  public function customer_resep()
  {
    return $this->hasMany(ResepObat::class, 'id_customer', 'id_pengguna');
  }
}
