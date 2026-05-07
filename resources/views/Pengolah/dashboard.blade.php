<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- ALERT SECTION --}}
            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-600 text-white rounded-xl shadow flex items-center gap-3">
                    <i class="fa-solid fa-circle-check"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-600 text-white rounded-xl shadow flex items-center gap-3">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    {{ session('error') }}
                </div>
            @endif

            {{-- WELCOME HEADER --}}
            <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white p-8 rounded-3xl shadow-lg mb-8 relative overflow-hidden">
                <h3 class="text-2xl font-bold">
                    Halo, {{ auth()->user()->name }} 👋
                </h3>
                <p class="mt-2 text-sm opacity-90">
                    Kelola produksi briket dan konfirmasi pengambilan limbah kopi Anda 🌱
                </p>
                <i class="fa-solid fa-industry absolute -right-5 -bottom-5 text-[120px] opacity-10"></i>
            </div>

            {{-- FORM POSTING BRIKET --}}
            <div class="bg-white p-6 rounded-2xl shadow mb-6">
                <h3 class="font-bold mb-4 text-slate-700">Posting Briket</h3>
                <form action="{{ route('pengolah.store_briket') }}" method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-3">
                    @csrf
                    <input type="text" name="nama_produk" placeholder="Nama produk" class="border border-slate-200 rounded-lg p-2 focus:ring-emerald-500" required>
                    <input type="number" name="stok" placeholder="Stok (Kg)" class="border border-slate-200 rounded-lg p-2 focus:ring-emerald-500" required>
                    <input type="number" name="harga" placeholder="Harga" class="border border-slate-200 rounded-lg p-2 focus:ring-emerald-500" required>
                    
                    <textarea name="description" placeholder="Deskripsi" class="border border-slate-200 rounded-lg p-2 md:col-span-4 focus:ring-emerald-500"></textarea>

                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2 rounded-lg md:col-span-4 transition shadow-sm">
                        Posting Produk
                    </button>
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- KONFIRMASI LIMBAH --}}
                <div class="bg-white p-6 rounded-2xl shadow">
                    <h3 class="font-bold mb-4 text-slate-700">Konfirmasi Limbah</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-slate-50 text-slate-600">
                                <tr>
                                    <th class="p-3 text-left">Kedai</th>
                                    <th class="p-3 text-center">Berat</th>
                                    <th class="p-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($semua_limbah as $item)
                                    <tr class="border-b hover:bg-slate-50 transition">
                                        <td class="p-3">
                                            <div class="flex flex-col">
                                                <span class="font-bold text-slate-700">{{ $item->user->name }}</span>
                                                <span class="text-xs text-slate-400">{{ $item->jadwal_pickup }}</span>
                                            </div>
                                        </td>
                                        <td class="p-3 text-center font-bold text-emerald-600">
                                            {{ $item->berat_kg }} kg
                                        </td>
                                        <td class="p-3 text-center">
                                            <div class="flex flex-col items-center gap-1">
                                                @if($item->pengolah_id == null)
                                                    <form action="{{ route('pengolah.update_status', $item->id) }}" method="POST">
                                                        @csrf
                                                        <button class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-1 rounded-lg text-xs font-semibold shadow-sm transition">
                                                            Terima
                                                        </button>
                                                    </form>
                                                @elseif($item->pengolah_id == Auth::id())
                                                    <span class="text-emerald-600 text-xs font-bold bg-emerald-50 px-2 py-1 rounded">✓ Diambil</span>
                                                    
                                                    {{-- WhatsApp Link dipindah ke sini (di bawah status Diambil) --}}
                                                    @if(isset($item->user->nomor_wa))
                                                        <a href="https://wa.me/{{ $item->user->nomor_wa }}?text=Halo%20{{ $item->user->name }},%20saya%20pengolah%20dari%20KOFFUEL%20Nexus%20ingin%20konfirmasi%20penjemputan%20limbah." 
                                                           target="_blank"
                                                           class="text-[10px] text-emerald-600 hover:underline flex items-center gap-1 font-semibold">
                                                            <i class="fa-brands fa-whatsapp"></i> Hubungi Kedai
                                                        </a>
                                                    @endif
                                                @else
                                                    <span class="text-slate-400 text-xs italic">Oleh Pengolah Lain</span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-slate-400 py-10 italic">
                                            Tidak ada data limbah tersedia
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- DAFTAR PRODUK ANDA --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                    <h3 class="font-bold text-slate-700 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-box text-emerald-500"></i>
                        Produk Anda
                    </h3>
                    <div class="space-y-3">
                        @forelse($briket_saya as $briket)
                            <div class="border border-slate-100 p-4 rounded-xl hover:border-emerald-200 transition flex justify-between items-center group">
                                <div>
                                    <div class="font-bold text-slate-800">{{ $briket->nama_produk }}</div>
                                    <div class="text-sm text-slate-500 mt-1">
                                        Stok: <span class="font-semibold {{ $briket->stok == 0 ? 'text-red-500' : 'text-slate-700' }}">{{ $briket->stok }} kg</span> | 
                                        <span class="text-emerald-600 font-bold">Rp {{ number_format($briket->harga,0,',','.') }}</span>
                                    </div>
                                </div>

                                {{-- TOMBOL HAPUS --}}
                                <form action="{{ route('pengolah.destroy_briket', $briket->id) }}" method="POST" 
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-slate-300 hover:text-red-600 transition p-2">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        @empty
                            <div class="text-center py-10">
                                <i class="fa-solid fa-box-open text-slate-200 text-4xl mb-2"></i>
                                <p class="text-slate-400 text-sm">Belum ada produk diposting</p>
                            </div>
                        @endforelse
                    </div>
                </div>

            {{-- TRANSAKSI MASUK --}}
            <div class="mt-8 bg-white p-6 rounded-2xl shadow">
                <h3 class="font-bold mb-6 text-slate-700">Transaksi Masuk</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-slate-50 text-slate-600">
                            <tr>
                                <th class="p-3 text-left">Pembeli</th>
                                <th class="p-3 text-center">Jumlah</th>
                                <th class="p-3 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transaksis as $trx)
                                <tr class="border-b hover:bg-slate-50 transition">
                                    <td class="p-3 text-left">
                                        <div class="font-medium text-slate-700">
                                            {{ $trx->user->name ?? 'User Terhapus' }}
                                        </div>
                                    </td>
                                    <td class="p-3 text-center font-semibold text-emerald-600">
                                        {{ $trx->jumlah }} kg
                                    </td>
                                    <td class="p-3 text-center">
                                        <div class="flex flex-col items-center gap-1">
                                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-[10px] font-bold uppercase tracking-wider">
                                                Selesai
                                            </span>
                                            @if(isset($trx->user->nomor_wa))
                                                <a href="https://wa.me/{{ $trx->user->nomor_wa }}?text=Halo%20{{ $trx->user->name }},%20saya%20dari%20KOFFUEL%20Nexus%20ingin%20mengonfirmasi%20pesanan%20briket%20Anda." 
                                                   target="_blank"
                                                   class="text-[10px] text-emerald-600 hover:underline flex items-center gap-1 font-semibold mt-1">
                                                    <i class="fa-brands fa-whatsapp"></i> Hubungi Pembeli
                                                </a>
                                            @else
                                                <span class="text-[10px] text-slate-400 italic">No. WA tidak terdaftar</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-slate-400 py-16 italic">
                                        Belum ada riwayat transaksi masuk
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>