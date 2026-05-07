<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Limbah; 
use App\Models\Briket; 
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class PengolahController extends Controller 
{
    public function index()
    {
        $transaksis = Transaksi::with('user','briket')
            ->where('pengolah_id', Auth::id())
            ->latest()
            ->get();

        $semua_limbah = Limbah::with('user')->latest()->get();
        $briket_saya = Briket::where('pengolah_id', Auth::id())->latest()->get();

        return view('pengolah.dashboard', compact(
            'semua_limbah',
            'briket_saya',
            'transaksis'
        ));
    }

    public function updateStatusLimbah(Request $request, $id) 
    {
        $limbah = Limbah::findOrFail($id);

        if ($limbah->pengolah_id !== null && $limbah->pengolah_id !== Auth::id()) {
            return back()->with('error', 'Maaf, limbah ini sudah dikonfirmasi oleh pengolah lain.');
        }

        $limbah->update([
            'status' => 'diterima',
            'pengolah_id' => Auth::id() 
        ]);

        return back()->with('success', 'Limbah berhasil dikonfirmasi!');
    }

    public function destroy_briket($id)
    {
        $briket = Briket::where('id', $id)->where('pengolah_id', Auth::id())->firstOrFail();
        $briket->delete();

        return back()->with('success', 'Produk berhasil dihapus!');
    }

    /**
     * simpan data briket baru
     */
    public function storeBriket(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'stok'        => 'required|numeric', 
            'harga'       => 'required|numeric',
        ]);

        Briket::create([
            'pengolah_id' => Auth::id(),
            'nama_produk' => $request->nama_produk,
            'stok'        => $request->stok, 
            'harga'       => $request->harga,
            'deskripsi'   => $request->deskripsi ?? '-',
        ]);

        return back()->with('success', 'Briket berhasil diposting!');
    }
}