<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';

    // protected $attributes = [
    //     'email' => 'default_email',
    //     'active' => 1,
    //     'count' => 0
    // ];

    // protected static $rules = [
    //     'id' => 'required|numeric|integer',
    //     'image' => 'nullable|string|max:255',
    //     'active' => 'nullable|boolean',
    //     'count' => 'nullable|numeric|integer',
    //     'email' => 'required|string|max:100|email'
    // ];

    protected $casts = [
        'tanggal' => 'datetime:d-m-Y H:i:s'
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
