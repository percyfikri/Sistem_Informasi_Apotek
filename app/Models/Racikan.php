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
  public function racikan()
  {
    return $this->hasOne(Racikan::class, 'id_racikan');
  }
  public function detailResep()
  {
    return $this->hasOne(DetailResep::class, 'id_racikan');
  }
}
