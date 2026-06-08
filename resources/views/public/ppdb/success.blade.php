<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Berhasil - Assaidiyyah</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-emerald-50 via-white to-cyan-50">

    <div class="min-h-screen flex items-center justify-center px-4 py-10">

        <div class="w-full max-w-2xl rounded-[2rem] bg-white p-6 sm:p-10 text-center shadow-2xl shadow-emerald-200">

            <div class="mx-auto flex h-28 w-28 items-center justify-center rounded-[2rem] bg-emerald-50 text-6xl">
                ✅
            </div>

            <h1 class="mt-6 text-3xl sm:text-4xl font-black text-slate-900">
                Pendaftaran Berhasil
            </h1>

            <p class="mt-3 text-slate-500">
                Terima kasih telah mendaftar di Pondok Pesantren Assaidiyyah.
                Simpan nomor pendaftaran berikut untuk pengecekan status.
            </p>

            <div class="mt-8 rounded-3xl bg-gradient-to-r from-emerald-500 to-cyan-500 p-6 text-white">
                <p class="text-sm font-bold text-white/80">
                    Nomor Pendaftaran
                </p>

                <h2 class="mt-2 text-3xl font-black tracking-wide">
                    {{ $registration->registration_number }}
                </h2>

                <p class="mt-3 font-bold">
                    {{ $registration->student_name }}
                </p>
            </div>

            <div class="mt-8 grid gap-3 sm:grid-cols-2">
                <a href="{{ route('ppdb.create') }}"
                   class="rounded-2xl bg-blue-600 px-5 py-4 font-black text-white shadow-lg shadow-blue-200">
                    Daftar Lagi
                </a>

                <a href="/"
                   class="rounded-2xl bg-slate-100 px-5 py-4 font-black text-slate-600">
                    Kembali ke Beranda
                </a>
            </div>

        </div>

    </div>

</body>
</html>