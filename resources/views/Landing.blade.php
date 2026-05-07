<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOFFUEL Nexus</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-slate-50 text-slate-800">

    <!-- NAVBAR -->
    <nav class="flex justify-between items-center px-8 py-5 bg-white shadow-sm">
        <h1 class="text-xl font-extrabold text-emerald-600 tracking-wide">
            KOFFUEL Nexus
        </h1>

        <a href="{{ route('login') }}"
           class="bg-emerald-600 text-white px-5 py-2 rounded-xl font-semibold hover:bg-emerald-700 transition shadow">
           Login
        </a>
    </nav>

    <!-- HERO SECTION -->
    <section class="text-center py-20 px-6">
        <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">
            Ubah Limbah Kopimu Jadi <br>
            <span class="text-emerald-600">Energi Bernilai 🔥</span>
        </h2>

        <p class="text-slate-500 max-w-xl mx-auto mb-8">
            Platform yang menghubungkan kedai kopi, pengolah limbah,
            dan UMKM untuk menciptakan ekosistem ekonomi sirkular.
        </p>

        <a href="{{ route('login') }}"
           class="bg-emerald-600 text-white px-8 py-3 rounded-xl font-bold text-lg hover:bg-emerald-700 transition shadow-lg">
           Mulai Sekarang
        </a>
    </section>

    <!-- FITUR -->
    <section class="max-w-6xl mx-auto px-6 py-16 grid md:grid-cols-3 gap-6">

        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <i class="fa-solid fa-store text-emerald-500 text-2xl mb-4"></i>
            <h3 class="font-bold text-lg mb-2">Untuk Kedai</h3>
            <p class="text-sm text-slate-500">
                Kirim limbah kopi dengan mudah dan berkontribusi pada lingkungan.
            </p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <i class="fa-solid fa-industry text-emerald-500 text-2xl mb-4"></i>
            <h3 class="font-bold text-lg mb-2">Untuk Pengolah</h3>
            <p class="text-sm text-slate-500">
                Olah limbah menjadi briket dan jual ke pasar UMKM.
            </p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <i class="fa-solid fa-shop text-emerald-500 text-2xl mb-4"></i>
            <h3 class="font-bold text-lg mb-2">Untuk UMKM</h3>
            <p class="text-sm text-slate-500">
                Beli briket berkualitas untuk kebutuhan usaha Anda.
            </p>
        </div>

    </section>

    <!-- CTA -->
    <section class="bg-emerald-600 text-white text-center py-16 px-6">
        <h3 class="text-3xl font-bold mb-4">
            Siap Bergabung?
        </h3>
        <p class="mb-6 opacity-90">
            Jadilah bagian dari solusi energi ramah lingkungan 🌱
        </p>

        <a href="{{ route('register') }}"
           class="bg-white text-emerald-600 px-6 py-3 rounded-xl font-bold hover:bg-gray-100 transition">
           Daftar Sekarang
        </a>
    </section>

    <!--FOOTER -->
    <footer class="text-center py-6 text-sm text-slate-400">
        © 2026 KOFFUEL Nexus - Circular Economy Platform
    </footer>

</body>
</html>