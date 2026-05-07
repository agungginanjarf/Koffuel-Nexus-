<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Briket extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengolah_id',
        'nama_produk',
        'harga',
        'stok', 
        'deskripsi',
    ];

    public function pengolah()
    {
        return $this->belongsTo(User::class, 'pengolah_id');
    }
}