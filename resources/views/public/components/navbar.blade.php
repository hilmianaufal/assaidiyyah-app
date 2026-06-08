<header x-data="{ open: false }" class="fixed inset-x-0 top-0 z-50">
    <div class="mx-auto max-w-7xl px-4 pt-4">
        <nav class="rounded-3xl border border-white/10 bg-white/10 px-4 py-3 shadow-2xl backdrop-blur-2xl">

            <div class="flex items-center justify-between gap-4">

                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-500 to-cyan-400 text-2xl shadow-lg shadow-blue-950/20">
                        🕌
                    </div>

                    <div>
                        <h1 class="text-sm font-black leading-tight sm:text-lg">
                            Assaidiyyah
                        </h1>
                        <p class="text-[11px] font-semibold text-blue-100">
                            Pondok Pesantren
                        </p>
                    </div>
                </a>

                <div class="hidden items-center gap-8 text-sm font-bold text-blue-50 lg:flex">
                    <a href="#program" class="transition hover:text-cyan-300">Program</a>
                    <a href="#berita" class="transition hover:text-cyan-300">Berita</a>
                    <a href="#prestasi" class="transition hover:text-cyan-300">Prestasi</a>
                    <a href="#galeri" class="transition hover:text-cyan-300">Galeri</a>
                    <a href="#kontak" class="transition hover:text-cyan-300">Kontak</a>
                </div>

                <div class="flex items-center gap-2">
                    <a href="{{ route('ppdb.create') }}"
                       class="hidden rounded-2xl bg-white px-5 py-3 text-sm font-black text-blue-700 shadow-xl sm:inline-flex">
                        PPDB Online
                    </a>

                    <button @click="open = !open"
                            class="flex h-11 w-11 items-center justify-center rounded-2xl bg-white/10 text-xl lg:hidden">
                        ☰
                    </button>
                </div>

            </div>

            <div x-show="open"
                 x-transition
                 x-cloak
                 class="mt-4 space-y-2 border-t border-white/10 pt-4 lg:hidden">

                <a href="#program" @click="open = false" class="block rounded-2xl px-4 py-3 font-bold text-blue-50 hover:bg-white/10">
                    📚 Program
                </a>

                <a href="#berita" @click="open = false" class="block rounded-2xl px-4 py-3 font-bold text-blue-50 hover:bg-white/10">
                    📰 Berita
                </a>

                <a href="#prestasi" @click="open = false" class="block rounded-2xl px-4 py-3 font-bold text-blue-50 hover:bg-white/10">
                    🏆 Prestasi
                </a>

                <a href="#galeri" @click="open = false" class="block rounded-2xl px-4 py-3 font-bold text-blue-50 hover:bg-white/10">
                    🖼️ Galeri
                </a>

                <a href="#kontak" @click="open = false" class="block rounded-2xl px-4 py-3 font-bold text-blue-50 hover:bg-white/10">
                    📞 Kontak
                </a>

                <a href="{{ route('ppdb.create') }}"
                   class="block rounded-2xl bg-white px-4 py-3 text-center font-black text-blue-700">
                    📝 Daftar PPDB
                </a>
            </div>

        </nav>
    </div>
</header>