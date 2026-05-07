<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Koffuel Nexus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-emerald-50 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md border border-emerald-100">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-emerald-800">Koffuel <span class="text-emerald-500">Nexus</span></h2>
            <p class="text-gray-500">Buat akun untuk mulai mengelola limbah kopi.</p>
        </div>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded shadow-sm">
                <p class="font-bold">Gagal Daftar:</p>
                <ul class="mt-1 ml-4 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.process') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama Lengkap / Nama Kedai</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500" placeholder="Contoh: Kedai Kopi Mantap" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500" placeholder="nama@email.com" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nomor WhatsApp</label>
                    <input type="text" name="nomor_wa" value="{{ old('nomor_wa') }}" class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500" placeholder="Contoh: 628123456789" required>
                    <p class="text-[10px] text-gray-400 mt-1">* Gunakan format angka saja diawali 62 (Tanpa + atau spasi)</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Daftar Sebagai</label>
                    <select name="role" class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500" required>
                        <option value="kedai" {{ old('role') == 'kedai' ? 'selected' : '' }}>Kedai (Penyedia Limbah)</option>
                        <option value="pengolah" {{ old('role') == 'pengolah' ? 'selected' : '' }}>Pengolah (Pembuat Briket)</option>
                        <option value="umkm" {{ old('role') == 'umkm' ? 'selected' : '' }}>UMKM (Pembeli Briket)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500" required>
                </div>
            </div>

            <button type="submit" class="w-full mt-6 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 rounded-lg transition duration-300 shadow-lg shadow-emerald-200">
                Daftar Sekarang
            </button>

            <p class="text-center mt-6 text-sm text-gray-600">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-emerald-600 font-bold hover:underline">Masuk di sini</a>
            </p>
        </form>
    </div>
</body>
</html>