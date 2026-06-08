<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB Online - Assaidiyyah</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-cyan-50">

    <div class="min-h-screen px-4 py-8 sm:py-12">

        <div class="mx-auto max-w-5xl space-y-8">

            <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-blue-700 via-indigo-700 to-cyan-500 p-6 sm:p-10 text-white shadow-2xl shadow-blue-200">
                <div class="absolute right-8 bottom-4 text-8xl opacity-20">🕌</div>

                <div class="relative z-10">
                    <div class="inline-flex items-center gap-2 rounded-full bg-white/20 px-4 py-2 text-sm font-bold">
                        ✨ PPDB Online
                    </div>

                    <h1 class="mt-5 text-3xl sm:text-5xl font-black">
                        Pendaftaran Santri Baru
                    </h1>

                    <p class="mt-3 max-w-2xl text-blue-50">
                        Isi formulir berikut untuk mendaftar sebagai calon santri Pondok Pesantren Assaidiyyah.
                    </p>
                </div>
            </div>

            @if ($errors->any())
                <div class="rounded-3xl bg-red-50 border border-red-100 p-5 text-red-700 font-bold">
                    ⚠️ Mohon periksa kembali data yang diisi.
                </div>
            @endif

            <form action="{{ route('ppdb.store') }}"
                  method="POST"
                  class="rounded-[2rem] bg-white p-5 sm:p-8 shadow-xl shadow-slate-200/70 space-y-8">
                @csrf

                <div>
                    <h2 class="text-2xl font-black text-slate-900">
                        👨‍🎓 Data Calon Santri
                    </h2>

                    <div class="mt-5 grid gap-6 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">
                                Nama Lengkap
                            </label>
                            <input type="text"
                                   name="student_name"
                                   value="{{ old('student_name') }}"
                                   class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-blue-500 focus:ring-blue-500"
                                   required>
                            @error('student_name')
                                <p class="mt-2 text-sm text-red-600 font-bold">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">
                                Jenis Kelamin
                            </label>
                            <select name="gender"
                                    class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-bold focus:border-blue-500 focus:ring-blue-500"
                                    required>
                                <option value="male" @selected(old('gender') === 'male')>Putra</option>
                                <option value="female" @selected(old('gender') === 'female')>Putri</option>
                            </select>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">
                                Tempat Lahir
                            </label>
                            <input type="text"
                                   name="birth_place"
                                   value="{{ old('birth_place') }}"
                                   class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">
                                Tanggal Lahir
                            </label>
                            <input type="date"
                                   name="birth_date"
                                   value="{{ old('birth_date') }}"
                                   class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div class="sm:col-span-2">
                            <label class="mb-2 block text-sm font-black text-slate-700">
                                Alamat Lengkap
                            </label>
                            <textarea name="address"
                                      rows="4"
                                      class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-medium focus:border-blue-500 focus:ring-blue-500">{{ old('address') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="border-t border-slate-100 pt-8">
                    <h2 class="text-2xl font-black text-slate-900">
                        👨‍👩‍👧 Data Wali Santri
                    </h2>

                    <div class="mt-5 grid gap-6 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">
                                Nama Wali
                            </label>
                            <input type="text"
                                   name="guardian_name"
                                   value="{{ old('guardian_name') }}"
                                   class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-blue-500 focus:ring-blue-500"
                                   required>
                            @error('guardian_name')
                                <p class="mt-2 text-sm text-red-600 font-bold">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">
                                Nomor WhatsApp
                            </label>
                            <input type="text"
                                   name="guardian_phone"
                                   value="{{ old('guardian_phone') }}"
                                   placeholder="08xxxxxxxxxx"
                                   class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-blue-500 focus:ring-blue-500"
                                   required>
                            @error('guardian_phone')
                                <p class="mt-2 text-sm text-red-600 font-bold">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="border-t border-slate-100 pt-8">
                    <h2 class="text-2xl font-black text-slate-900">
                        📚 Informasi Pendidikan
                    </h2>

                    <div class="mt-5 grid gap-6 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">
                                Asal Sekolah
                            </label>
                            <input type="text"
                                   name="school_origin"
                                   value="{{ old('school_origin') }}"
                                   class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">
                                Pilihan Program
                            </label>
                            <select name="program_choice"
                                    class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-bold focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Pilih Program</option>
                                <option value="Tahfidz" @selected(old('program_choice') === 'Tahfidz')>Tahfidz</option>
                                <option value="Kitab Kuning" @selected(old('program_choice') === 'Kitab Kuning')>Kitab Kuning</option>
                                <option value="Reguler" @selected(old('program_choice') === 'Reguler')>Reguler</option>
                                <option value="Bahasa Arab" @selected(old('program_choice') === 'Bahasa Arab')>Bahasa Arab</option>
                            </select>
                        </div>

                        <div class="sm:col-span-2">
                            <label class="mb-2 block text-sm font-black text-slate-700">
                                Catatan Tambahan
                            </label>
                            <textarea name="notes"
                                      rows="4"
                                      placeholder="Contoh: pernah mondok, hafalan, kebutuhan khusus, dll."
                                      class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-medium focus:border-blue-500 focus:ring-blue-500">{{ old('notes') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 border-t border-slate-100 pt-8">
                    <button type="submit"
                            class="inline-flex flex-1 items-center justify-center rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 px-5 py-4 font-black text-white shadow-xl shadow-blue-200">
                        📝 Daftar Sekarang
                    </button>

                    <a href="/"
                       class="inline-flex items-center justify-center rounded-2xl bg-slate-100 px-5 py-4 font-black text-slate-600">
                        Kembali
                    </a>
                </div>

            </form>

        </div>

    </div>

</body>
</html>