<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
  use HasFactory;

  protected $table = 'detail_penjualan';

  protected $fillable = [
    'id_penjualan',
    'id_resep',
    'id_obat',
    'kuantitas',
    'satuan',
    'harga'
  ];
}
