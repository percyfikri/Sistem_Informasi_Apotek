<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jasa extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $table = 'jasa';
  protected $primaryKey = 'id_jasa';

  protected $fillable = [
    'id_apoteker',
    'tingkatan',
    'harga'
  ];
}
