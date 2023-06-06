<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\MockObject\Stub\ReturnStub;

class Penjualan extends Model
{
  use HasFactory;

  protected $table = 'penjualan';
  protected $primaryKey = 'id_penjualan';


  protected $fillable = [
    'id_penjualan',
    'id_customer',
    'id_apoteker',
    'id_jasa',
    'tanggal',
  ];

  public function customer()
  {
    return $this->belongsTo(Pengguna::class, 'id_customer', 'id_pengguna');
  }

  public function apoteker()
  {
    return $this->belongsTo(Pengguna::class, 'id_apoteker', 'id_pengguna');
  }

  public function jasa()
  {
    return $this->belongsTo(Jasa::class, 'id_jasa');
  }

  public function detail_penjualan()
  {
    return $this->hasMany(DetailPenjualan::class, 'id_penjualan');
  }
}
