<header x-data="{ open: false }" class="fixed inset-x-0 top-0 z-50">
    <div class="mx-auto max-w-7xl px-4 pt-4">
        <nav class="rounded-3xl border border-slate-200 bg-white px-4 py-3 shadow-xl shadow-slate-200">

            <div class="flex items-center justify-between gap-4">

                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="h-14 w-14 rounded-3xl bg-blue-50 p-2 shadow-lg shadow-blue-100">
                        @if($setting?->logo)
                            <img src="{{ asset('storage/' . $setting->logo) }}"
                                 alt="{{ $setting->site_name }}"
                                 class="h-full w-full object-contain">
                        @else
                            <div class="flex h-full w-full items-center justify-center text-2xl">
                                🕌
                            </div>
                        @endif
                    </div>

                    <div>
                        <h1 class="text-sm font-black leading-tight text-slate-900 sm:text-lg">
                            Assaidiyyah
                        </h1>
                        <p class="text-[11px] font-semibold text-slate-500">
                            Pondok Pesantren
                        </p>
                    </div>
                </a>

                <div class="hidden items-center gap-2 lg:flex">

                    <a href="{{ route('home') }}"
                       class="flex items-center gap-2 rounded-2xl px-4 py-3 text-sm font-black transition
                       {{ request()->routeIs('home') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-slate-700 hover:bg-blue-50 hover:text-blue-700' }}">
                        🏠 Home
                    </a>

                    <a href="{{ route('programs.index') }}"
                       class="flex items-center gap-2 rounded-2xl px-4 py-3 text-sm font-black transition
                       {{ request()->routeIs('programs.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-slate-700 hover:bg-blue-50 hover:text-blue-700' }}">
                        📚 Program
                    </a>

                    <a href="{{ route('news.index') }}"
                       class="flex items-center gap-2 rounded-2xl px-4 py-3 text-sm font-black transition
                       {{ request()->routeIs('news.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-slate-700 hover:bg-blue-50 hover:text-blue-700' }}">
                        📰 Berita
                    </a>

                    <a href="{{ route('achievements.index') }}"
                       class="flex items-center gap-2 rounded-2xl px-4 py-3 text-sm font-black transition
                       {{ request()->routeIs('achievements.*') ? 'bg-orange-500 text-white shadow-lg shadow-orange-200' : 'text-slate-700 hover:bg-orange-50 hover:text-orange-600' }}">
                        🏆 Prestasi
                    </a>

                    <a href="{{ route('gallery.index') }}"
                       class="flex items-center gap-2 rounded-2xl px-4 py-3 text-sm font-black transition
                       {{ request()->routeIs('gallery.*') ? 'bg-cyan-500 text-white shadow-lg shadow-cyan-200' : 'text-slate-700 hover:bg-cyan-50 hover:text-cyan-600' }}">
                        🖼️ Galeri
                    </a>

                    <a href="{{ route('about') }}"
                       class="flex items-center gap-2 rounded-2xl px-4 py-3 text-sm font-black transition
                       {{ request()->routeIs('about') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-200' : 'text-slate-700 hover:bg-indigo-50 hover:text-indigo-600' }}">
                        🏫 Tentang
                    </a>

                    <a href="{{ route('contact') }}"
                       class="flex items-center gap-2 rounded-2xl px-4 py-3 text-sm font-black transition
                       {{ request()->routeIs('contact') ? 'bg-pink-500 text-white shadow-lg shadow-pink-200' : 'text-slate-700 hover:bg-pink-50 hover:text-pink-600' }}">
                        📞 Kontak
                    </a>

                </div>

                <div class="hidden items-center gap-2 sm:flex">
                    <a href="{{ route('login') }}"
                       class="rounded-2xl bg-slate-100 px-5 py-3 text-sm font-black text-slate-700 transition hover:bg-slate-900 hover:text-white">
                        🔐 Login
                    </a>

                    <a href="{{ route('ppdb.create') }}"
                       class="rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 px-5 py-3 text-sm font-black text-white shadow-xl shadow-blue-200 transition hover:scale-[1.03]">
                        📝 PPDB
                    </a>
                </div>

                <button type="button"
                        @click="open = !open"
                        class="flex h-11 w-11 items-center justify-center rounded-2xl bg-slate-100 text-xl text-slate-700 lg:hidden">
                    ☰
                </button>

            </div>

            <div x-show="open"
                 x-transition
                 x-cloak
                 class="mt-4 space-y-2 border-t border-slate-200 pt-4 lg:hidden">

                <a href="{{ route('home') }}"
                   @click="open = false"
                   class="block rounded-2xl px-4 py-3 font-black transition
                   {{ request()->routeIs('home') ? 'bg-blue-600 text-white' : 'text-slate-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    🏠 Home
                </a>

                <a href="{{ route('programs.index') }}"
                   @click="open = false"
                   class="block rounded-2xl px-4 py-3 font-black transition
                   {{ request()->routeIs('programs.*') ? 'bg-blue-600 text-white' : 'text-slate-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    📚 Program
                </a>

                <a href="{{ route('news.index') }}"
                   @click="open = false"
                   class="block rounded-2xl px-4 py-3 font-black transition
                   {{ request()->routeIs('news.*') ? 'bg-blue-600 text-white' : 'text-slate-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    📰 Berita
                </a>

                <a href="{{ route('achievements.index') }}"
                   @click="open = false"
                   class="block rounded-2xl px-4 py-3 font-black transition
                   {{ request()->routeIs('achievements.*') ? 'bg-orange-500 text-white' : 'text-slate-700 hover:bg-orange-50 hover:text-orange-600' }}">
                    🏆 Prestasi
                </a>

                <a href="{{ route('gallery.index') }}"
                   @click="open = false"
                   class="block rounded-2xl px-4 py-3 font-black transition
                   {{ request()->routeIs('gallery.*') ? 'bg-cyan-500 text-white' : 'text-slate-700 hover:bg-cyan-50 hover:text-cyan-600' }}">
                    🖼️ Galeri
                </a>

                <a href="{{ route('about') }}"
                   @click="open = false"
                   class="block rounded-2xl px-4 py-3 font-black transition
                   {{ request()->routeIs('about') ? 'bg-indigo-600 text-white' : 'text-slate-700 hover:bg-indigo-50 hover:text-indigo-600' }}">
                    🏫 Tentang
                </a>

                <a href="{{ route('contact') }}"
                   @click="open = false"
                   class="block rounded-2xl px-4 py-3 font-black transition
                   {{ request()->routeIs('contact') ? 'bg-pink-500 text-white' : 'text-slate-700 hover:bg-pink-50 hover:text-pink-600' }}">
                    📞 Kontak
                </a>

                <div class="grid grid-cols-2 gap-2 pt-2">
                    <a href="{{ route('login') }}"
                       class="rounded-2xl bg-slate-100 px-4 py-3 text-center font-black text-slate-700">
                        🔐 Login
                    </a>

                    <a href="{{ route('ppdb.create') }}"
                       class="rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 px-4 py-3 text-center font-black text-white">
                        📝 PPDB
                    </a>
                </div>

            </div>

        </nav>
    </div>
</header>