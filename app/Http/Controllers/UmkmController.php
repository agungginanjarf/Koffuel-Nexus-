<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Briket; 
use Illuminate\Support\Facades\Auth;

class UmkmController extends Controller
{
    
public function index()
{
    $brikets = Briket::with('pengolah')->where('stok', '>', 0)->get();
    return view('umkm.dashboard', compact('brikets'));
}

public function beliBriket(Request $request, $id)
{
    $briket = Briket::findOrFail($id);
    if ($briket->stok > 0) {
        $briket->stok -= 1; 
        $briket->save();
        return back()->with('success', 'Berhasil membeli ' . $briket->nama_produk);
    }
    return back()->with('error', 'Stok habis!');

        // Kurangi stok
        $briket->stok -= $jumlah;
        $briket->save();

        return back()->with('success', 'Pesanan briket ' . $briket->nama_produk . ' berhasil diproses!');
    }
}