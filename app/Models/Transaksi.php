<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'user_id',
        'briket_id',
        'pengolah_id',
        'jumlah',
        'status'
    ];

    // 🔥 RELASI KE USER (PEMBELI / UMKM)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // 🔥 RELASI KE BRIKET
    public function briket()
    {
        return $this->belongsTo(Briket::class, 'briket_id');
    }

    // 🔥 RELASI KE PENGOLAH
    public function pengolah()
    {
        return $this->belongsTo(User::class, 'pengolah_id');
    }
}