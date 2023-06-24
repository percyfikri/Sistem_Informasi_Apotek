<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailResep extends Model
{
  use HasFactory;

  protected $table = 'detail_resep';
  protected $primaryKey = 'id_detail';

  protected $fillable = [
    'id_resep',
    'id_obat',
    'id_racikan',
    'kuantitas',
    'satuan',
    'harga',
  ];
  public function resep()
  {
    return $this->belongsTo(ResepObat::class, 'id_resep');
  }
  public function obat()
  {
    return $this->belongsTo(Obat::class, 'id_obat');
  }
  public function racikan()
  {
    return $this->belongsTo(Racikan::class, 'id_racikan');
  }
}
