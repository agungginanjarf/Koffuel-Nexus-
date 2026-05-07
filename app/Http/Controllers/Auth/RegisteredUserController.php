<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        // innput
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role'     => ['required', 'in:kedai,pengolah,umkm'],
            'nomor_wa' => ['required', 'string', 'min:10', 'max:15'], // Tambahan validasi WA
        ]);

        // simpan Database 
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
            'nomor_wa' => $request->nomor_wa, // Simpan nomor WA
        ]);

        event(new Registered($user));

        // Login 
        Auth::login($user);

        // role
        if ($user->role === 'pengolah') {
            return redirect()->route('pengolah.dashboard');
        } elseif ($user->role === 'kedai') {
            return redirect()->route('kedai.dashboard');
        }

        return redirect()->route('dashboard');
    }
}