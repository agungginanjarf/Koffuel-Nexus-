<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Limbah extends Model
{
    use HasFactory;

    // Memaksa Laravel menggunakan nama tabel 'limbah' (bukan 'limbahs')
    protected $table = 'limbah'; 

    protected $fillable = [
        'user_id', 
        'berat_kg', 
        'jadwal_pickup', 
        'status', 
        'pengolah_id' // Penting untuk fitur "Siapa cepat dia dapat"
    ];

    /**
     * Hubungan ke User (Kedai/Pemasok)
     * Membuat $item->user->name bisa berfungsi di dashboard
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Hubungan ke User (Pengolah yang menerima)
     * Digunakan untuk menampilkan siapa yang mengambil limbah
     */
    public function pengolah()
    {
        return $this->belongsTo(User::class, 'pengolah_id');
    }
}