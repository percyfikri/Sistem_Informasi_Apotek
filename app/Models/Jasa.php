<?php

namespace App\Models;

use App\Models\Pengguna;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jasa extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $table = 'jasa';
  protected $primaryKey = 'id_jasa';

  protected $fillable = [
    'id_apoteker',
    'nama_jasa',
    'tingkatan',
    'harga'
  ];

  public function detail_penjualan()
  {
    return $this->hasMany(DetailPenjualan::class, 'id_jasa');
  }

  public function apoteker()
  {
    return $this->belongsTo(Pengguna::class, 'id_apoteker', 'id_pengguna');
  }
}
