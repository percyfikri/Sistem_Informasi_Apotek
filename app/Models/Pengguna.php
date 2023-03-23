<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengguna extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $table = 'pengguna';
  protected $primaryKey = 'id_pengguna';

  protected $fillable = [
    'nama',
    'email',
    'jk',
    'umur',
    'status',
    'alamat',
  ];

  protected $hidden = [
    'password',
  ];
}
