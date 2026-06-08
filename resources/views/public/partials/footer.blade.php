<footer id="kontak" class="bg-slate-950 px-4 py-14 text-white">

    <div class="mx-auto max-w-7xl">

        <div class="grid gap-10 lg:grid-cols-4">

            <div class="lg:col-span-2">
                <div class="flex items-center gap-3">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-600 to-cyan-400 text-3xl">
                        🕌
                    </div>

                    <div>
                        <h3 class="text-2xl font-black">
                            {{ $setting?->site_name ?? 'Assaidiyyah' }}
                        </h3>

                        <p class="text-sm font-semibold text-blue-200">
                            Pondok Pesantren
                        </p>
                    </div>
                </div>

                <p class="mt-5 max-w-xl leading-relaxed text-slate-400">
                    {{ $setting?->description ?? 'Pondok Pesantren Assaidiyyah hadir untuk membentuk generasi Qurani, berakhlak mulia, berilmu, dan mandiri.' }}
                </p>
            </div>

            <div>
                <h4 class="text-lg font-black">
                    Menu Cepat
                </h4>

                <div class="mt-5 space-y-3 text-sm font-bold text-slate-400">
                    <a href="#program" class="block hover:text-cyan-300">📚 Program</a>
                    <a href="#berita" class="block hover:text-cyan-300">📰 Berita</a>
                    <a href="#prestasi" class="block hover:text-cyan-300">🏆 Prestasi</a>
                    <a href="#galeri" class="block hover:text-cyan-300">🖼️ Galeri</a>
                    <a href="{{ route('ppdb.create') }}" class="block hover:text-cyan-300">📝 PPDB Online</a>
                </div>
            </div>

            <div>
                <h4 class="text-lg font-black">
                    Kontak
                </h4>

                <div class="mt-5 space-y-3 text-sm font-bold text-slate-400">
                    <p>📍 {{ $setting?->address ?? 'Alamat pondok belum diisi.' }}</p>
                    <p>📱 {{ $setting?->phone ?? 'Nomor telepon belum diisi.' }}</p>
                    <p>📧 {{ $setting?->email ?? 'Email belum diisi.' }}</p>
                </div>

                @if($setting?->phone)
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->phone) }}"
                       target="_blank"
                       class="mt-5 inline-flex rounded-2xl bg-emerald-500 px-5 py-3 font-black text-white shadow-lg shadow-emerald-950/20">
                        WhatsApp
                    </a>
                @endif
            </div>

        </div>

        <div class="mt-12 border-t border-white/10 pt-6 text-center text-sm font-semibold text-slate-500">
            © {{ date('Y') }} {{ $setting?->site_name ?? 'Pondok Pesantren Assaidiyyah' }}. All rights reserved.
        </div>

    </div>

</footer>