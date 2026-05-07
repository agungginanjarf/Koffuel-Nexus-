
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KedaiController;
use App\Http\Controllers\PengolahController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes - KOFFUEL Nexus
|--------------------------------------------------------------------------
*/
// --- GUEST AREA ---
Route::get('/', function () {
    return view('landing');
});

// Auth System
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.process');
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.process');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::delete('/pengolah/briket/{id}', [PengolahController::class, 'destroy_briket'])->name('pengolah.destroy_briket');
// --- AUTH AREA ---
Route::middleware(['auth'])->group(function () {
    
    
     // DASHBOARD BRIDGE
    Route::get('/dashboard', function () {
        $role = auth()->user()->role; 
        
        if (Route::has($role . '.dashboard')) {
            return redirect()->route($role . '.dashboard');
        }
        
        abort(403, 'Role tidak dikenali atau rute belum terdaftar.');
    })->name('dashboard');

    
    Route::get('/home', function () {
        return redirect()->route('dashboard');
    });

    // --- FITUR KEDAI ---
    Route::prefix('kedai')->name('kedai.')->group(function () {
        Route::get('/', [KedaiController::class, 'index'])->name('dashboard');
        Route::post('/kirim-limbah', [KedaiController::class, 'storeLimbah'])->name('store');
    });

    // --- FITUR PENGOLAH ---
    Route::prefix('pengolah')->name('pengolah.')->group(function () {
        Route::get('/', [PengolahController::class, 'index'])->name('dashboard');
        Route::post('/update-status/{id}', [PengolahController::class, 'updateStatusLimbah'])->name('update_status');
        Route::post('/jual-briket', [PengolahController::class, 'storeBriket'])->name('store_briket');
    });

    // --- FITUR UMKM ---
    Route::prefix('umkm')->name('umkm.')->group(function () {
        Route::get('/', [UmkmController::class, 'index'])->name('dashboard');
        Route::post('/beli-briket/{id}', [UmkmController::class, 'beliBriket'])->name('beli');
        
    });



Route::middleware(['auth'])->group(function () {

    Route::post('/beli/{id}', [TransaksiController::class, 'beli'])->name('umkm.beli');
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('pengolah.transaksi');
    Route::post('/transaksi/{id}/konfirmasi', [TransaksiController::class, 'konfirmasi'])->name('pengolah.konfirmasi');
});
});