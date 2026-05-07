<x-app-layout>

    <x-slot name="header">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <h2 class="font-semibold text-xl text-emerald-800 leading-tight">
            {{ __('Katalog Briket Kopi - KOFFUEL') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Alert Notifikasi --}}
            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-500 text-white rounded-xl shadow-lg flex items-center gap-3 animate-bounce">
                    <i class="fa-solid fa-circle-check text-xl"></i>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-500 text-white rounded-xl shadow-lg flex items-center gap-3">
                    <i class="fa-solid fa-circle-exclamation text-xl"></i>
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            @endif

            {{-- Welcome Card --}}
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-emerald-100 mb-8 flex justify-between items-center overflow-hidden relative">
                <div class="relative z-10">
                    <h3 class="text-3xl font-extrabold text-slate-800">Halo, {{ auth()->user()->name }}! 👋</h3>
                    <p class="text-slate-500 mt-2 text-lg">Siap untuk memajukan UMKM Anda dengan briket ramah lingkungan?</p>
                </div>
                <i class="fa-solid fa-store text-9xl text-emerald-50 absolute -right-5 -bottom-5 rotate-12"></i>
            </div>

            {{-- Grid Katalog --}}
            <div class="flex items-center gap-2 mb-6">
                <div class="h-8 w-2 bg-emerald-500 rounded-full"></div>
                <h3 class="text-xl font-bold text-slate-800">Produk Briket Tersedia</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse($brikets as $briket)
                    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-2xl hover:-translate-y-2 transition duration-300 group">
                        
                        <div class="h-48 bg-emerald-600 flex flex-col items-center justify-center text-white relative">
                            <i class="fa-solid fa-cubes text-6xl opacity-20 group-hover:scale-110 transition"></i>
                            <span class="absolute bottom-3 left-3 bg-white/20 backdrop-blur-md px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-wider">
                                Premium Quality
                            </span>
                        </div>

                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <h4 class="font-bold text-slate-800 text-xl leading-tight">{{ $briket->nama_produk }}</h4>
                            </div>
                            
                            <p class="text-slate-500 text-sm mb-6 line-clamp-2 italic">"{{ $briket->deskripsi }}"</p>
                            
                            <div class="bg-slate-50 rounded-2xl p-4 mb-6">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-xs font-bold text-slate-400 uppercase">Harga / Kg</span>
                                    <span class="text-emerald-600 font-black text-xl">Rp{{ number_format($briket->harga, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-xs font-bold text-slate-400 uppercase">Stok Tersedia</span>
                                 
                                    <span class="bg-emerald-100 text-emerald-700 text-[10px] px-2 py-1 rounded-md font-black uppercase">{{ $briket->stok }} KG</span>
                                </div>
                            </div>

                            <div class="flex gap-2">
                                {{-- WhatsApp Penjual --}}
                                <a href="https://wa.me/{{ $briket->pengolah->nomor_wa ?? '' }}?text=Halo%20{{ $briket->pengolah->name ?? 'Penjual' }},%20saya%20UMKM%20{{ auth()->user()->name }}%20tertarik%20dengan%20briket%20{{ $briket->nama_produk }}" 
                                   target="_blank" 
                                   class="flex-1 bg-white border-2 border-emerald-500 text-emerald-600 font-bold py-3 rounded-2xl text-center hover:bg-emerald-50 transition flex items-center justify-center gap-2">
                                    <i class="fa-brands fa-whatsapp text-lg"></i> Chat
                                </a>

                                {{-- Tombol Beli --}}
                                <form action="{{ route('umkm.beli', $briket->id) }}" method="POST" class="flex-1">
                                    @csrf
                                    <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 rounded-2xl shadow-lg shadow-emerald-100 transition flex items-center justify-center gap-2">
                                        <i class="fa-solid fa-cart-plus"></i> Beli
                                    </button>
                                </form>
                            </div>

                            <div class="mt-4 pt-4 border-t border-slate-50 flex items-center gap-2">
                                <div class="h-8 w-8 bg-slate-100 rounded-full flex items-center justify-center">
                                    <i class="fa-solid fa-user-tie text-slate-400 text-xs"></i>
                                </div>
                                <span class="text-[11px] text-slate-500 font-medium">Penjual: <b class="text-slate-700">{{ $briket->pengolah->name ?? 'Pengolah' }}</b></span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center bg-white rounded-3xl border-2 border-dashed border-slate-200">
                        <i class="fa-solid fa-box-open text-6xl text-slate-200 mb-4"></i>
                        <p class="text-slate-400 text-lg italic">Belum ada briket yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>