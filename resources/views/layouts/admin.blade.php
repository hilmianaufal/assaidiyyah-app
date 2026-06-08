<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Assaidiyyah</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 text-slate-900 overflow-x-hidden">

<div class="min-h-screen">

    {{-- DESKTOP SIDEBAR --}}
    <aside class="hidden xl:flex fixed left-0 top-0 bottom-0 z-40 w-72 bg-gradient-to-b from-blue-950 via-blue-800 to-blue-600 text-white flex-col overflow-y-auto">

        <div class="p-6">

            {{-- BRAND --}}
            <div class="flex items-center gap-4 mb-10">
                <div class="w-14 h-14 rounded-3xl bg-white/15 p-2 shadow-lg">
                    @if($setting?->logo)
                        <img
                            src="{{ asset('storage/' . $setting->logo) }}"
                            alt="{{ $setting->site_name }}"
                            class="h-full w-full object-contain">
                    @else
                        <div class="flex h-full w-full items-center justify-center text-2xl">
                            🕌
                        </div>
                    @endif
                </div>

                <div>
                    <h1 class="text-2xl font-black leading-tight">
                        Assaidiyyah
                    </h1>
                    <p class="text-sm text-blue-100">
                        Admin Panel
                    </p>
                </div>
            </div>

            {{-- MENU --}}
            @php
                $menus = [
                    [
                        'title' => 'Dashboard',
                        'icon' => '🏠',
                        'url' => route('admin.dashboard'),
                        'active' => request()->routeIs('admin.dashboard'),
                    ],
                    [
                        'title' => 'Tulisan',
                        'icon' => '📰',
                        'url' => route('admin.news.index'),
                        'active' => request()->routeIs('admin.news.*'),
                    ],
                    [
                        'title' => 'Kategori Tulisan',
                        'icon' => '🏷️',
                        'url' => route('admin.news-categories.index'),
                        'active' => request()->routeIs('admin.news-categories.*'),
                    ],
                    [
                        'title' => 'Tag Berita',
                        'icon' => '#️⃣',
                        'url' => route('admin.news-tags.index'),
                        'active' => request()->routeIs('admin.news-tags.*'),
                    ],
                    [
                        'title' => 'Pengumuman',
                        'icon' => '📢',
                        'url' => route('admin.announcements.index'),
                        'active' => request()->routeIs('admin.announcements.*'),
                    ],
                    [
                        'title' => 'Agenda',
                        'icon' => '📅',
                        'url' => route('admin.agendas.index'),
                        'active' => request()->routeIs('admin.agendas.*'),
                    ],
                    [
                        'title' => 'Struktur',
                        'icon' => '🏢',
                        'url' => route('admin.organizations.index'),
                        'active' => request()->routeIs('admin.organizations.*'),
                    ],
                    [
                        'title' => 'Prestasi',
                        'icon' => '🏆',
                        'url' => route('admin.achievements.index'),
                        'active' => request()->routeIs('admin.achievements.*'),
                    ],
                    [
                        'title' => 'Galeri',
                        'icon' => '🖼️',
                        'url' => route('admin.galleries.index'),
                        'active' => request()->routeIs('admin.galleries.*'),
                    ],

                    [
                        'title' => 'Program',
                        'icon' => '📚',
                        'url' => route('admin.programs.index'),
                        'active' => request()->routeIs('admin.programs.*'),
                    ],
                    [
                        'title' => 'Ustadz',
                        'icon' => '👳',
                        'url' => route('admin.teachers.index'),
                        'active' => request()->routeIs('admin.teachers.*'),
                    ],
                    [
                        'title' => 'Santri',
                        'icon' => '👥',
                        'url' => route('admin.students.index'),
                        'active' => request()->routeIs('admin.students.*'),
                    ],
                    [
                        'title' => 'PPDB',
                        'icon' => '📝',
                        'url' => route('admin.registrations.index'),
                        'active' => request()->routeIs('admin.registrations.*'),
                    ],
                    [
                        'title' => 'Testimoni',
                        'icon' => '⭐',
                        'url' => route('admin.testimonials.index'),
                        'active' => request()->routeIs('admin.testimonials.*'),
                    ],

                    [
                        'title' => 'Penulis',
                        'icon' => '✍️',
                        'url' => route('admin.authors.index'),
                        'active' => request()->routeIs('admin.authors.*'),
                    ],

                    [
                        'title' => 'Pengaturan',
                        'icon' => '⚙️',
                        'url' => route('admin.settings.index'),
                        'active' => request()->routeIs('admin.settings.*'),
                    ],
                ];
            @endphp

            <nav class="space-y-2">
                @foreach ($menus as $menu)
                    <a href="{{ $menu['url'] }}"
                       class="js-menu-item group relative flex items-center gap-4 rounded-3xl px-4 py-3.5 transition-all duration-300
                       {{ $menu['active']
                            ? 'bg-white text-blue-700 shadow-2xl shadow-blue-950/20'
                            : 'text-blue-50 hover:bg-white/10 hover:translate-x-1' }}">

                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl text-xl transition-all duration-300
                            {{ $menu['active']
                                ? 'bg-gradient-to-br from-blue-500 to-cyan-400 text-white shadow-lg shadow-blue-300/40'
                                : 'bg-white/10 group-hover:bg-white/20' }}">
                            {{ $menu['icon'] }}
                        </span>

                        <span class="font-bold">
                            {{ $menu['title'] }}
                        </span>

                        @if ($menu['active'])
                            <span class="ml-auto h-2 w-2 rounded-full bg-blue-500"></span>
                        @else
                            <span class="ml-auto opacity-0 transition group-hover:opacity-100">
                                ›
                            </span>
                        @endif
                    </a>
                @endforeach
            </nav>

        </div>

        {{-- SIDEBAR FOOTER --}}
        <div class="mt-auto p-6">
            <div class="rounded-3xl bg-white/10 border border-white/15 p-5 backdrop-blur-xl mb-4">
                <div class="text-3xl mb-3">✨</div>

                <h3 class="font-black">
                    Pondok Pesantren Assaidiyyah
                </h3>

                <p class="mt-2 text-sm leading-relaxed text-blue-100">
                    Membentuk Generasi Qur'ani Berakhlak Mulia dan Berprestasi.
                </p>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="w-full rounded-2xl border border-white/20 px-4 py-3 font-bold text-white hover:bg-white/10 transition">
                    Logout
                </button>
            </form>
        </div>

    </aside>

    {{-- MAIN WRAPPER --}}
    <div class="xl:ml-72 min-h-screen">

        {{-- TOPBAR --}}
        <header class="sticky top-0 z-30 bg-white/90 backdrop-blur-xl border-b border-slate-200">
            <div class="h-20 px-4 sm:px-6 lg:px-8 flex items-center justify-between gap-4">

                <div>
                    <p class="text-xs font-black text-blue-600 tracking-widest uppercase">
                        Admin Panel
                    </p>

                    <h2 class="text-xl sm:text-2xl font-black text-slate-900">
                        Assaidiyyah
                    </h2>
                </div>

                <div class="hidden md:flex flex-1 max-w-md mx-8">
                    <input
                        type="text"
                        placeholder="Cari sesuatu..."
                        class="w-full rounded-2xl border-0 bg-slate-100 px-5 py-3 text-sm focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="flex items-center gap-3">
                    <div class="hidden sm:block text-right">
                        <p class="text-sm font-black text-slate-900">
                            {{ auth()->user()->name }}
                        </p>
                        <p class="text-xs text-slate-500">
                            Super Admin
                        </p>
                    </div>

                    <div class="h-12 w-12 rounded-2xl bg-gradient-to-br from-blue-600 to-cyan-500 flex items-center justify-center text-white font-black shadow-lg shadow-blue-200">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                </div>

            </div>
        </header>

        {{-- PAGE CONTENT --}}
        <main class="p-4 sm:p-6 lg:p-8 pb-28">
            <div class="js-animate-content max-w-7xl mx-auto">
                {{ $slot }}
            </div>
        </main>

    </div>

    {{-- MOBILE BOTTOM NAV --}}
    <nav class="xl:hidden fixed bottom-4 left-4 right-4 z-50 rounded-[2rem] bg-white/95 backdrop-blur-xl border border-slate-200 shadow-2xl">
        <div class="grid grid-cols-4 gap-1 p-2">

            <a href="{{ route('admin.dashboard') }}"
               class="js-mobile-nav flex flex-col items-center justify-center gap-1 rounded-2xl py-2.5 transition
               {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-600' : 'text-slate-500' }}">
                <span class="text-xl">🏠</span>
                <span class="text-[11px] font-bold">Home</span>
            </a>

            <a href="{{ route('admin.news.index') }}"
               class="js-mobile-nav flex flex-col items-center justify-center gap-1 rounded-2xl py-2.5 transition
               {{ request()->routeIs('admin.news.*') ? 'bg-blue-50 text-blue-600' : 'text-slate-500' }}">
                <span class="text-xl">📰</span>
                <span class="text-[11px] font-bold">Berita</span>
            </a>

            <a href="#"
               class="js-mobile-nav flex flex-col items-center justify-center gap-1 rounded-2xl py-2.5 text-slate-500 transition">
                <span class="text-xl">🖼️</span>
                <span class="text-[11px] font-bold">Galeri</span>
            </a>

            <a href="#"
               class="js-mobile-nav flex flex-col items-center justify-center gap-1 rounded-2xl py-2.5 text-slate-500 transition">
                <span class="text-xl">⚙️</span>
                <span class="text-[11px] font-bold">Setting</span>
            </a>

        </div>
    </nav>

</div>
@stack('scripts')
</body>
</html>