<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRacikan extends Model
{
  use HasFactory;

  protected $table = 'detail_racikan';
  protected $primaryKey = 'id_detail_racikan';



  protected $fillable = [
    'id_racikan',
    'id_obat',
    'kuantitas',
    'satuan'
  ];
  public function racikan()
  {
    return $this->belongsTo(Racikan::class, 'id_racikan');
  }
  public function obat()
  {
    return $this->belongsTo(Obat::class, 'id_obat');
  }
}
