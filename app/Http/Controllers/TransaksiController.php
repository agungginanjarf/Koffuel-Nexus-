<?php

namespace App\Http\Controllers;

use App\Models\Briket;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class TransaksiController extends Controller
{
    public function beli(Request $request, $id)
{
    $briket = Briket::with('pengolah')->findOrFail($id);
 
    $request->validate([
        'jumlah' => 'required|numeric|min:1|max:' . $briket->stok
    ]);

    
    $transaksi = Transaksi::create([
        'user_id'     => Auth::id(),
        'briket_id'   => $briket->id,
        'pengolah_id' => $briket->pengolah_id,
        'jumlah'      => $request->jumlah,
        'status'      => 'pending'
    ]);

    $briket->decrement('stok', $request->jumlah);

    $pesan = urlencode(
        "Halo {$briket->pengolah->name}, saya ingin membeli {$request->jumlah} kg {$briket->nama_produk}"
    );

    return redirect("https://wa.me/{$briket->pengolah->nomor_wa}?text={$pesan}");
}
}