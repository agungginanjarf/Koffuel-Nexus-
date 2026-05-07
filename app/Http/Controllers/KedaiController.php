<?php
namespace App\Http\Controllers;

use App\Models\Limbah; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KedaiController extends Controller
{
    public function index()
    {
        $limbahs = Limbah::with('pengolah')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('kedai.dashboard', compact('limbahs'));
    }

    public function storeLimbah(Request $request)
    {
        $request->validate([
            'berat_kg' => 'required|numeric|min:1',
            'jadwal_pickup' => 'required|date|after_or_equal:today',
        ]);

        Limbah::create([
            'user_id' => Auth::id(),
            'berat_kg' => $request->berat_kg,
            'jadwal_pickup' => $request->jadwal_pickup,
            'status' => 'menunggu',
        ]);

        return back()->with('success', 'Data limbah berhasil dikirim! Mohon tunggu konfirmasi pengolah.');
    }
}