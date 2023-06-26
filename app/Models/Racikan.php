<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Racikan extends Model
{
  use HasFactory;

  protected $table = 'racikan';
  protected $primaryKey = 'id_racikan';

  protected $fillable = [
    'nama_racikan',
    'harga',
    'catatan'
  ];

  public function detail_racikan()
  {
    return $this->hasMany(DetailRacikan::class, 'id_racikan');
  }
}
