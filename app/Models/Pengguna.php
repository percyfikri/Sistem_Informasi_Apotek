<?php

namespace App\Models;

use App\Models\Jasa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengguna extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $table = 'pengguna';
  protected $primaryKey = 'id_pengguna';

  //   protected $fillable = [
  //     'nama',
  //     'email',
  //     'jk',
  //     'umur',
  //     'status',
  //     'alamat',
  //   ];

  protected $hidden = [
    'password',
  ];

  public function jasa()
  {
    return $this->hasMany(Jasa::class, 'id_apoteker', 'id_pengguna');
  }
}
