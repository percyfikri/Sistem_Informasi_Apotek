<?php

namespace App\Models;

use App\Models\Obat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokObat extends Model
{
  use HasFactory;

  protected $table = 'stok_obat';
  protected $primaryKey = 'id_obat';
  protected $fillable = [
    'id_obat',
    'satuan',
    'kuantitas',
    'harga'
  ];
  public function obat()
  {
    return $this->belongsTo(Obat::class, 'id_obat');
  }
}
