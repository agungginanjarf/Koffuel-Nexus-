<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-bold text-amber-900">KOFFUEL <span class="text-green-700">Nexus</span></h2>
        <p class="text-sm text-gray-500 mt-2">Silahkan masuk untuk mengelola limbah kopi Anda.</p>
    </div>

    <form method="POST" action="{{ route('login.process') }}">
        @csrf

        <div class="group">
            <x-input-label for="email" :value="__('Email')" class="group-focus-within:text-amber-700 transition-colors" />
            <x-text-input id="email" 
                class="block mt-1 w-full border-gray-300 focus:border-amber-500 focus:ring-amber-500 rounded-lg shadow-sm" 
                type="email" 
                name="email" 
                :value="old('email')" 
                placeholder="nama@email.com"
                required autofocus autocomplete="username" />
            
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6 group">
            <x-input-label for="password" :value="__('Password')" class="group-focus-within:text-amber-700 transition-colors" />
            <x-text-input id="password" 
                class="block mt-1 w-full border-gray-300 focus:border-amber-500 focus:ring-amber-500 rounded-lg shadow-sm"
                type="password"
                name="password"
                placeholder="••••••••"
                required autocomplete="current-password" />
            
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between mt-6">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-amber-600 shadow-sm focus:ring-amber-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
            </label>
        </div>

        <div class="mt-8">
            <x-primary-button class="w-full justify-center py-3 bg-amber-800 hover:bg-amber-900 active:bg-amber-950 focus:ring-amber-500 text-base shadow-lg transition-all transform hover:-translate-y-0.5">
                {{ __('Masuk Sekarang') }}
            </x-primary-button>
        </div>

        <p class="mt-8 text-center text-sm text-gray-600">
            Belum punya akun? 
            <a href="/register" class="font-semibold text-green-700 hover:text-green-800 underline">Daftar di sini</a>
        </p>
    </form>
</x-guest-layout>