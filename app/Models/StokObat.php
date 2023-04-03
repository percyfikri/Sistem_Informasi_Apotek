<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokObat extends Model
{
  use HasFactory;

  protected $table = 'stok_obat';

  protected $fillable = [
    'id_obat',
    'satuan',
    'harga',
    'kuantitas'
  ];
  public function stokObat()
  {
    return $this->belongsTo(Obat::class, 'id_obat');
  }
}
