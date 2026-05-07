<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koffuel Nexus</title>

    @vite(['resources/css/app.css'])
</head>

<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-emerald-900 text-white">

    {{-- NAVBAR --}}
    <nav class="flex justify-between items-center px-10 py-5">
        <h1 class="text-2xl font-extrabold text-emerald-400">
            KOFFUEL Nexus
        </h1>

        <div class="space-x-3">
            <a href="{{ route('login') }}"
               class="px-5 py-2 border border-white/20 rounded-xl hover:bg-white/10 transition">
               Login
            </a>

            <a href="{{ route('register') }}"
               class="bg-emerald-500 hover:bg-emerald-600 px-5 py-2 rounded-xl font-semibold transition">
               Daftar
            </a>
        </div>
    </nav>

    {{-- HERO --}}
    <section class="text-center py-28 px-6">

        <h2 class="text-5xl md:text-6xl font-extrabold leading-tight mb-6">
            Solusi Limbah Kopi <br>
            <span class="text-emerald-400">Menjadi Energi Bernilai</span>
        </h2>

        <p class="text-slate-300 max-w-2xl mx-auto mb-10">
            Koffuel Nexus adalah platform digital yang menghubungkan UMKM dan pengolah
            untuk mengubah limbah kopi menjadi briket ramah lingkungan.
        </p>

        <div class="flex justify-center gap-4">
            <a href="{{ route('register') }}"
               class="bg-emerald-500 hover:bg-emerald-600 px-8 py-3 rounded-2xl font-bold text-lg shadow-lg transition">
               Mulai Sekarang
            </a>

            <a href="{{ route('login') }}"
               class="border border-white/20 px-8 py-3 rounded-2xl text-lg hover:bg-white/10 transition">
               Login
            </a>
        </div>

    </section>

    {{-- FITUR --}}
    <section class="py-20 px-10">
        <h3 class="text-2xl font-bold text-center mb-12">
            Fitur Utama
        </h3>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="bg-white/5 p-6 rounded-2xl border border-white/10 hover:scale-105 transition">
                <h4 class="font-bold text-emerald-400 mb-2">♻️ Kelola Limbah</h4>
                <p class="text-slate-300 text-sm">
                    UMKM dapat mengirim limbah kopi untuk diproses menjadi briket.
                </p>
            </div>

            <div class="bg-white/5 p-6 rounded-2xl border border-white/10 hover:scale-105 transition">
                <h4 class="font-bold text-emerald-400 mb-2">🔥 Produksi Briket</h4>
                <p class="text-slate-300 text-sm">
                    Pengolah memproduksi dan menjual briket langsung dari sistem.
                </p>
            </div>

            <div class="bg-white/5 p-6 rounded-2xl border border-white/10 hover:scale-105 transition">
                <h4 class="font-bold text-emerald-400 mb-2">🛒 Beli Mudah</h4>
                <p class="text-slate-300 text-sm">
                    UMKM bisa membeli briket dan langsung terhubung via WhatsApp.
                </p>
            </div>

        </div>
    </section>

    {{-- CTA --}}
    <section class="py-20 text-center">
        <h3 class="text-3xl font-bold mb-4">
            Mulai Sekarang 🚀
        </h3>

        <p class="text-slate-300 mb-6">
            Gabung dan mulai transaksi limbah & briket dengan mudah
        </p>

        <a href="{{ route('register') }}"
           class="bg-emerald-500 hover:bg-emerald-600 px-8 py-3 rounded-2xl font-bold text-lg">
           Daftar Gratis
        </a>
    </section>

    {{-- FOOTER --}}
    <footer class="text-center py-6 text-slate-400 text-sm">
        © {{ date('Y') }} Koffuel Nexus
    </footer>

</body>
</html>