<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-emerald-700">
            Dashboard Kedai
        </h2>
    </x-slot>

    <div class="py-10 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-6">

            {{-- ALERT --}}
            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-500/90 text-white rounded-2xl shadow flex items-center gap-3">
                    <i class="fa-solid fa-circle-check"></i>
                    {{ session('success') }}
                </div>
            @endif

            {{-- WELCOME --}}
            <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white p-8 rounded-3xl shadow-lg mb-8 relative overflow-hidden">
                <h3 class="text-2xl font-bold">
                    Halo, {{ auth()->user()->name }} 👋
                </h3>
                <p class="mt-2 text-sm opacity-90">
                    Kelola limbah kopi Anda dengan mudah dan berkontribusi pada lingkungan 🌱
                </p>

                <i class="fa-solid fa-seedling absolute -right-5 -bottom-5 text-[120px] opacity-10"></i>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- FORM --}}
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100">
                    <h3 class="font-bold text-slate-700 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-plus text-emerald-500"></i>
                        Kirim Limbah
                    </h3>

                    <form action="{{ route('kedai.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <div>
                            <label class="text-sm text-slate-500">Berat (Kg)</label>
                            <input type="number" name="berat_kg"
                                class="w-full mt-1 rounded-xl border-slate-200 focus:ring-emerald-500 focus:border-emerald-500"
                                placeholder="Contoh: 5" required>
                        </div>

                        <div>
                            <label class="text-sm text-slate-500">Tanggal Pickup</label>
                            <input type="date" name="jadwal_pickup"
                                class="w-full mt-1 rounded-xl border-slate-200 focus:ring-emerald-500 focus:border-emerald-500"
                                required>
                        </div>

                        <button class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-3 rounded-xl font-semibold transition">
                            Kirim Sekarang
                        </button>
                    </form>
                </div>

                {{-- RIWAYAT --}}
                <div class="lg:col-span-2 bg-white p-6 rounded-3xl shadow-sm border border-slate-100">

                    <h3 class="font-bold text-slate-700 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-clock text-emerald-500"></i>
                        Riwayat Pengiriman
                    </h3>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">

                            <thead>
                                <tr class="text-left text-slate-400 border-b">
                                    <th class="py-3">Tanggal</th>
                                    <th class="py-3">Berat</th>
                                    <th class="py-3 text-center">Status</th>
                                    <th class="py-3 text-center">Pengolah</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($limbahs as $limbah)
                                <tr class="border-b hover:bg-slate-50 transition">

                                    <td class="py-3 font-medium text-slate-700">
                                        {{ $limbah->jadwal_pickup }}
                                    </td>

                                    <td class="py-3 text-emerald-600 font-semibold">
                                        {{ $limbah->berat_kg }} Kg
                                    </td>

                                    <td class="py-3 text-center">
                                        @if($limbah->status == 'menunggu')
                                            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-semibold">Menunggu</span>
                                        @elseif($limbah->status == 'diterima')
                                            <span class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-xs font-semibold">Diterima</span>
                                        @else
                                            <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-xs font-semibold">Ditolak</span>
                                        @endif
                                    </td>

                                    <td class="py-3 text-center">
                                        @if($limbah->pengolah_id)
                                            <div class="flex flex-col items-center gap-1">
                                                <span class="text-xs font-semibold text-slate-700">
                                                    {{ $limbah->pengolah->name }}
                                                </span>
                                                <a href="https://wa.me/{{ $limbah->pengolah->nomor_wa }}"
                                                   target="_blank"
                                                   class="text-xs text-emerald-600 hover:underline">
                                                    Hubungi
                                                </a>
                                            </div>
                                        @else
                                            <span class="text-xs text-slate-400 italic">
                                                Belum diambil
                                            </span>
                                        @endif
                                    </td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="py-10 text-center text-slate-400 italic">
                                        Belum ada data
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>