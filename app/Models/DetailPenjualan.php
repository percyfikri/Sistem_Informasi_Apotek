<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
  use HasFactory;

  protected $table = 'detail_penjualan';
  protected $primaryKey = 'id_detail_racikan';

  protected $fillable = [
    'id_penjualan',
    'id_resep',
    'id_obat',
    'id_jasa',
    'kuantitas',
    'satuan',
    'subtotal',
  ];

  public function penjualan()
  {
    return $this->belongsTo(Penjualan::class, 'id_penjualan');
  }
  public function resep()
  {
    return $this->belongsTo(ResepObat::class, 'id_resep');
  }
  public function obat()
  {
    return $this->belongsTo(Obat::class, 'id_obat');
  }
  public function jasa()
  {
    return $this->belongsTo(Jasa::class, 'id_jasa');
  }
}
