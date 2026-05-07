<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-bold text-emerald-700">
            Katalog Briket Kopi
        </h2>
    </x-slot>

    <div class="py-10 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-6">

            {{-- ALERT --}}
            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-500 text-white rounded-xl shadow flex items-center gap-3">
                    <i class="fa-solid fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            {{-- WELCOME --}}
            <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white p-8 rounded-3xl shadow-lg mb-8 relative overflow-hidden">
                <h3 class="text-2xl font-bold">
                    Halo, {{ auth()->user()->name }} 👋
                </h3>
                <p class="mt-2 text-sm opacity-90">
                    Pilih briket kopi berkualitas tinggi untuk mendukung efisiensi energi usaha Anda 🌱
                </p>

                <i class="fa-solid fa-shop absolute -right-5 -bottom-5 text-[120px] opacity-10"></i>
            </div>

            {{-- TITLE --}}
            <div class="flex items-center gap-3 mb-6">
                <div class="h-8 w-1 bg-emerald-500 rounded-full"></div>
                <h3 class="text-lg font-bold text-slate-700">
                    Produk Tersedia
                </h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">

                @forelse($brikets as $briket)
                <div class="bg-white rounded-3xl shadow-sm border hover:shadow-xl hover:-translate-y-1 transition overflow-hidden flex flex-col">

                    {{-- HEADER --}}
                    <div class="h-40 bg-emerald-600 flex items-center justify-center relative">
                        <i class="fa-solid fa-cubes text-5xl text-white/30"></i>

                        <span class="absolute bottom-3 left-3 bg-white/20 text-white text-[10px] px-2 py-1 rounded-md backdrop-blur">
                            PREMIUM
                        </span>
                    </div>

                    <div class="p-5 flex flex-col flex-1">

                        {{-- NAMA --}}
                        <h4 class="font-bold text-slate-800 text-lg mb-1">
                            {{ $briket->nama_produk }}
                        </h4>

                        {{-- DESKRIPSI --}}
                        <p class="text-xs text-slate-400 italic mb-4 line-clamp-2">
                            "{{ $briket->deskripsi }}"
                        </p>

                        {{-- INFO --}}
                        <div class="bg-slate-50 p-3 rounded-xl mb-4">
                            <div class="flex justify-between text-sm">
                                <span class="text-slate-400">Harga</span>
                                <span class="font-bold text-emerald-600">
                                    Rp{{ number_format($briket->harga,0,',','.') }}
                                </span>
                            </div>

                            <div class="flex justify-between text-xs mt-2">
                                <span class="text-slate-400">Stok</span>
                                <span class="bg-emerald-100 text-emerald-700 px-2 py-1 rounded-md font-semibold">
                                    {{ $briket->stok }} KG
                                </span>
                            </div>
                        </div>

                        {{-- FORM BELI --}}
                        <form action="{{ route('umkm.beli', $briket->id) }}" method="POST" class="mt-auto">
                            @csrf

                            {{-- INPUT JUMLAH --}}
                            <label class="text-xs text-slate-500">Jumlah beli (Kg)</label>
                            <div class="flex items-center gap-2 mb-3">
                                <input 
                                    type="number" 
                                    name="jumlah"
                                    min="1"
                                    max="{{ $briket->stok }}"
                                    required
                                    class="w-full border border-slate-200 rounded-xl px-3 py-2 text-sm focus:ring-emerald-500 focus:border-emerald-500"
                                    placeholder="Masukkan jumlah...">

                                <span class="text-xs text-slate-500">kg</span>
                            </div>

                            {{-- BUTTON --}}
                            <button type="submit"
                                class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2 rounded-xl transition shadow">
                                <i class="fa-solid fa-cart-plus mr-1"></i> Beli via WA
                            </button>
                        </form>

                        {{-- SELLER --}}
                        <div class="mt-4 text-[11px] text-slate-400">
                            Penjual:
                            <span class="font-semibold text-slate-600">
                                {{ $briket->pengolah->name ?? '-' }}
                            </span>
                        </div>

                    </div>
                </div>

                @empty
                <div class="col-span-full text-center py-20 text-slate-400">
                    <i class="fa-solid fa-box-open text-4xl mb-2"></i>
                    <p>Belum ada produk tersedia</p>
                </div>
                @endforelse

            </div>

        </div>
    </div>

</x-app-layout>