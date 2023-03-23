<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepObat extends Model
{
  use HasFactory;

  protected $table = 'resep_obat';
  protected $primaryKey = 'id_resep';

  protected $fillable = [
    'id_dokter',
    'id_customer',
    'nama_resep',
    'deskripsi',
    'tanggal',
    'status',
  ];

  protected $casts = [
    'tanggal' => 'datetime:d-m-Y H:i:s'
  ];
}
