<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailResep extends Model
{
  use HasFactory;

  protected $table = 'detail_resep';

  protected $fillable = [
    'id_resep',
    'id_obat',
    'id_racikan',
    'kuantitas',
    'satuan',
  ];
}
