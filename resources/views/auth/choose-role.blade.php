<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Peran - Koffuel Nexus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#0f172a] text-white flex items-center justify-center min-h-screen p-6">

    <div class="max-w-6xl w-full">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4 tracking-tight">
                Selamat Datang di <span class="text-emerald-500">Koffuel Nexus</span>
            </h1>
            <p class="text-slate-400 text-lg md:text-xl max-w-2xl mx-auto">
                Pilih peran Anda untuk menyesuaikan pengalaman dashboard Anda.
            </p>
        </div>

        <form action="/select-role" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @csrf
            
            <button type="submit" name="role" value="kedai" 
                class="group relative bg-slate-800/50 border-2 border-slate-700 p-8 rounded-[2rem] hover:border-emerald-500 hover:bg-slate-800 transition-all duration-300 text-left focus:outline-none focus:ring-4 focus:ring-emerald-500/20">
                <div class="w-16 h-16 bg-emerald-500/10 rounded-2xl flex items-center justify-center mb-6 text-emerald-500 text-3xl group-hover:scale-110 group-hover:bg-emerald-500 group-hover:text-white transition-all duration-300">
                    <i class="fa-solid fa-shop"></i>
                </div>
                <h3 class="text-2xl font-bold mb-3 text-white">Kedai Kopi</h3>
                <p class="text-slate-400 leading-relaxed">
                    pemasok limbah kopi rutin dan ingin mengelolanya menjadi sesuatu yang bernilai.
                </p>
                <div class="mt-6 flex items-center text-emerald-500 font-semibold opacity-0 group-hover:opacity-100 transition-opacity">
                    Pilih Peran <i class="fa-solid fa-arrow-right ml-2 text-sm"></i>
                </div>
            </button>

            <button type="submit" name="role" value="pengolah" 
                class="group relative bg-slate-800/50 border-2 border-slate-700 p-8 rounded-[2rem] hover:border-emerald-500 hover:bg-slate-800 transition-all duration-300 text-left focus:outline-none focus:ring-4 focus:ring-emerald-500/20">
                <div class="w-16 h-16 bg-emerald-500/10 rounded-2xl flex items-center justify-center mb-6 text-emerald-500 text-3xl group-hover:scale-110 group-hover:bg-emerald-500 group-hover:text-white transition-all duration-300">
                    <i class="fa-solid fa-factory"></i>
                </div>
                <h3 class="text-2xl font-bold mb-3 text-white">Pengolah</h3>
                <p class="text-slate-400 leading-relaxed">
                    Pengelola dan pusat pengumpulan limbah kopi menjadi produk baru.
                </p>
                <div class="mt-6 flex items-center text-emerald-500 font-semibold opacity-0 group-hover:opacity-100 transition-opacity">
                    Pilih Peran <i class="fa-solid fa-arrow-right ml-2 text-sm"></i>
                </div>
            </button>

            <button type="submit" name="role" value="umkm" 
                class="group relative bg-slate-800/50 border-2 border-slate-700 p-8 rounded-[2rem] hover:border-emerald-500 hover:bg-slate-800 transition-all duration-300 text-left focus:outline-none focus:ring-4 focus:ring-emerald-500/20">
                <div class="w-16 h-16 bg-emerald-500/10 rounded-2xl flex items-center justify-center mb-6 text-emerald-500 text-3xl group-hover:scale-110 group-hover:bg-emerald-500 group-hover:text-white transition-all duration-300">
                    <i class="fa-solid fa-leaf"></i>
                </div>
                <h3 class="text-2xl font-bold mb-3 text-white">UMKM</h3>
                <p class="text-slate-400 leading-relaxed">
                    Produksi turunan kreatif dari hasil olahan limbah kopi.
                </p>
                <div class="mt-6 flex items-center text-emerald-500 font-semibold opacity-0 group-hover:opacity-100 transition-opacity">
                    Pilih Peran <i class="fa-solid fa-arrow-right ml-2 text-sm"></i>
                </div>
            </button>

        </form>

        <p class="text-center mt-12 text-slate-500 text-sm">
            Peran ini akan menentukan fitur dashboard Anda. Anda tidak dapat mengubahnya secara mandiri setelah dipilih.
        </p>
    </div>

</body>
</html>