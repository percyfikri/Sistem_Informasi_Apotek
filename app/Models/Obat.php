<?php

namespace App\Models;

use App\Models\StokObat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Obat extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $table = 'obat';
  protected $primaryKey = 'id_obat';

  protected $fillable = [
    'nama_obat',
    'jenis_obat',
  ];

  public function obat()
  {
    return $this->hasMany(StokObat::class, 'id_obat');
  }
}
