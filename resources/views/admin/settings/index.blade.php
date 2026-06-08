<x-admin-layout>
    <div class="space-y-6">

        <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-slate-900 via-blue-900 to-blue-600 p-6 sm:p-8 text-white shadow-2xl shadow-blue-200">
            <div class="absolute right-8 bottom-4 text-7xl opacity-20">⚙️</div>

                <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500 p-8 shadow-xl">

                    <div class="absolute -right-10 -top-10 w-48 h-48 bg-white/10 rounded-full blur-3xl"></div>
                    <div class="absolute right-10 bottom-5 text-8xl opacity-20">
                        ⚙️
                    </div>

                    <div class="relative z-10">

                        <span class="inline-flex items-center gap-2 rounded-full bg-white/20 px-4 py-2 text-sm font-bold text-white">
                            ✨ Konfigurasi Website
                        </span>

                        <h1 class="mt-5 text-4xl font-black text-white">
                            Pengaturan Website
                        </h1>

                        <p class="mt-3 max-w-2xl text-blue-100">
                            Atur identitas, kontak, profil, visi misi, logo dan gambar utama
                            Pondok Pesantren Assaidiyyah.
                        </p>

                    </div>

                </div>
        </div>

        @if(session('success'))
            <div class="rounded-3xl border border-emerald-100 bg-emerald-50 p-4 text-sm font-bold text-emerald-700">
                ✅ {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.settings.update') }}"
              method="POST"
              enctype="multipart/form-data"
              class="rounded-[2rem] bg-white p-5 sm:p-8 shadow-xl shadow-slate-200/70 space-y-8">
            @csrf
            @method('PUT')

            <div class="grid gap-6 lg:grid-cols-3">

                <div class="lg:col-span-2 space-y-6">

                    <div>
                        <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                            🕌 Nama Pondok
                        </label>

                        <input type="text"
                               name="site_name"
                               value="{{ old('site_name', $setting->site_name) }}"
                               class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-blue-500 focus:ring-blue-500"
                               required>

                        @error('site_name')
                            <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                            ✨ Tagline
                        </label>

                        <input type="text"
                               name="tagline"
                               value="{{ old('tagline', $setting->tagline) }}"
                               placeholder="Contoh: Membentuk Generasi Qurani..."
                               class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-blue-500 focus:ring-blue-500">

                        @error('tagline')
                            <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid gap-6 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                                📧 Email
                            </label>

                            <input type="email"
                                   name="email"
                                   value="{{ old('email', $setting->email) }}"
                                   placeholder="info@assaidiyyah.sch.id"
                                   class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-blue-500 focus:ring-blue-500">

                            @error('email')
                                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                                📱 WhatsApp / Telepon
                            </label>

                            <input type="text"
                                   name="phone"
                                   value="{{ old('phone', $setting->phone) }}"
                                   placeholder="08xxxxxxxxxx"
                                   class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-blue-500 focus:ring-blue-500">

                            @error('phone')
                                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                            📍 Alamat
                        </label>

                        <textarea name="address"
                                  rows="4"
                                  placeholder="Alamat lengkap pondok..."
                                  class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-medium focus:border-blue-500 focus:ring-blue-500">{{ old('address', $setting->address) }}</textarea>

                        @error('address')
                            <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                            📖 Deskripsi Pondok
                        </label>

                        <textarea name="description"
                                  rows="8"
                                  placeholder="Profil singkat Pondok Pesantren Assaidiyyah..."
                                  class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-medium leading-relaxed focus:border-blue-500 focus:ring-blue-500">{{ old('description', $setting->description) }}</textarea>

                        @error('description')
                            <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid gap-6 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                                🎯 Visi
                            </label>

                            <textarea name="vision"
                                      rows="6"
                                      placeholder="Visi pondok..."
                                      class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-medium leading-relaxed focus:border-blue-500 focus:ring-blue-500">{{ old('vision', $setting->vision) }}</textarea>

                            @error('vision')
                                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                                🚀 Misi
                            </label>

                            <textarea name="mission"
                                      rows="6"
                                      placeholder="Misi pondok..."
                                      class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-medium leading-relaxed focus:border-blue-500 focus:ring-blue-500">{{ old('mission', $setting->mission) }}</textarea>

                            @error('mission')
                                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="space-y-6">

                    <div class="rounded-3xl bg-slate-50 p-5">
                        <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                            🖼️ Logo Pondok
                        </label>

                        @if($setting->logo)
                            <img src="{{ asset('storage/' . $setting->logo) }}"
                                 class="mb-4 h-32 w-32 rounded-3xl object-cover shadow">
                        @else
                            <div class="mb-4 flex h-32 w-32 items-center justify-center rounded-3xl bg-gradient-to-br from-blue-100 to-cyan-100 text-5xl">
                                🕌
                            </div>
                        @endif

                        <input type="file"
                               name="logo"
                               class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm">

                        <p class="mt-2 text-xs text-slate-500">
                            Opsional. JPG/PNG/WEBP maksimal 2MB.
                        </p>

                        @error('logo')
                            <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="rounded-3xl bg-slate-50 p-5">
                        <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                            🌄 Gambar Hero
                        </label>

                        @if($setting->hero_image)
                            <img src="{{ asset('storage/' . $setting->hero_image) }}"
                                 class="mb-4 h-44 w-full rounded-2xl object-cover shadow">
                        @else
                            <div class="mb-4 flex h-44 w-full items-center justify-center rounded-2xl bg-gradient-to-br from-blue-100 to-cyan-100 text-5xl">
                                🌄
                            </div>
                        @endif

                        <input type="file"
                               name="hero_image"
                               class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm">

                        <p class="mt-2 text-xs text-slate-500">
                            Disarankan landscape. Maksimal 4MB.
                        </p>

                        @error('hero_image')
                            <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="rounded-3xl bg-blue-50 p-5 text-blue-700">
                        <div class="text-3xl">💡</div>

                        <h3 class="mt-3 font-black">
                            Tips Pengaturan
                        </h3>

                        <p class="mt-2 text-sm leading-relaxed">
                            Data ini nanti akan dipakai otomatis di halaman depan website, footer, kontak, dan halaman profil pondok.
                        </p>
                    </div>

                </div>

            </div>

            <div class="flex flex-col sm:flex-row gap-3 border-t border-slate-100 pt-6">
                <button type="submit"
                        class="inline-flex flex-1 items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 px-5 py-4 font-black text-white shadow-xl shadow-blue-200">
                    💾 Simpan Pengaturan
                </button>

                <a href="{{ route('admin.dashboard') }}"
                   class="inline-flex items-center justify-center rounded-2xl bg-slate-100 px-5 py-4 font-black text-slate-600">
                    Kembali Dashboard
                </a>
            </div>

        </form>

    </div>
</x-admin-layout>