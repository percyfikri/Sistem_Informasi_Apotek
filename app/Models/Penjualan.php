<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';
    protected $primaryKey = 'id_penjualan';

    protected $casts = [
        'tanggal' => 'datetime:d-m-Y H:i:s'
    ];

    protected $fillable = [
        'id_penjualan',
        'id_customer',
        'id_apoteker',
        'id_jasa',
        'tanggal',
    ];

    public function customer()
    {
        return $this->belongsTo(Pengguna::class, 'id_customer', 'id_pengguna');
    }

    public function apoteker()
    {
        return $this->belongsTo(Pengguna::class, 'id_apoteker', 'id_pengguna');
    }

    public function jasa()
    {
        return $this->belongsTo(Jasa::class, 'id_jasa');
    }
}
