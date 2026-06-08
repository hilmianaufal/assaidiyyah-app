<x-admin-layout>
    <div class="space-y-6">

        <section class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-blue-700 via-indigo-700 to-cyan-500 p-6 sm:p-8 text-white shadow-2xl shadow-blue-200">
            <div class="absolute -right-16 -top-16 h-56 w-56 rounded-full bg-white/10 blur-3xl"></div>
            <div class="absolute right-8 bottom-4 text-8xl opacity-20">🕌</div>

            <div class="relative z-10">
                <div class="inline-flex items-center gap-2 rounded-full bg-white/20 px-4 py-2 text-sm font-bold">
                    ✨ Dashboard Admin
                </div>

                <h1 class="mt-5 text-3xl sm:text-5xl font-black">
                    Selamat Datang, {{ auth()->user()->name }}
                </h1>

                <p class="mt-3 max-w-2xl text-blue-50">
                    Kelola website Pondok Pesantren Assaidiyyah dari satu dashboard yang modern, cepat, dan responsif.
                </p>
            </div>
        </section>

        <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-5">
            @php
                $stats = [
                                        [
                            'title' => 'Santri',
                            'value' => $totalStudents,
                            'icon' => '👨‍🎓',
                            'color' => 'from-emerald-500 to-green-500',
                            'url' => route('admin.students.index'),
                        ],
                        [
                        'title' => 'Ustadz',
                        'value' => $totalTeachers,
                        'icon' => '👳',
                        'color' => 'from-yellow-500 to-orange-500',
                        'url' => route('admin.teachers.index'),
                    ],
                    [
                        'title' => 'Prestasi',
                        'value' => $totalAchievements,
                        'icon' => '🏆',
                        'color' => 'from-yellow-400 to-orange-500',
                        'url' => route('admin.achievements.index'),
                    ],
                    [
                        'title' => 'Testimoni',
                        'value' => $totalTestimonials,
                        'icon' => '⭐',
                        'color' => 'from-pink-500 to-rose-500',
                        'url' => route('admin.testimonials.index'),
                    ],
                    [
                        'title' => 'PPDB',
                        'value' => $totalRegistrations,
                        'icon' => '📝',
                        'color' => 'from-indigo-500 to-blue-500',
                        'url' => route('admin.registrations.index'),
                    ],
                    ['title' => 'Berita', 'value' => $totalNews, 'icon' => '📰', 'color' => 'from-blue-500 to-cyan-500', 'url' => route('admin.news.index')],
                    ['title' => 'Pengumuman', 'value' => $totalAnnouncements, 'icon' => '📢', 'color' => 'from-orange-500 to-pink-500', 'url' => route('admin.announcements.index')],
                    ['title' => 'Agenda', 'value' => $totalAgendas, 'icon' => '📅', 'color' => 'from-purple-500 to-indigo-500', 'url' => route('admin.agendas.index')],
                    ['title' => 'Galeri', 'value' => $totalGalleries, 'icon' => '🖼️', 'color' => 'from-pink-500 to-rose-500', 'url' => route('admin.galleries.index')],
                    ['title' => 'Program', 'value' => $totalPrograms, 'icon' => '📚', 'color' => 'from-emerald-500 to-teal-500', 'url' => route('admin.programs.index')],
                    ];
            @endphp

            @foreach($stats as $stat)
                <a href="{{ $stat['url'] }}"
                   class="group rounded-[2rem] bg-white p-5 shadow-xl shadow-slate-200/70 border border-white transition hover:-translate-y-1 hover:shadow-2xl">

                    <div class="flex items-center justify-between">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br {{ $stat['color'] }} text-2xl shadow-lg">
                            {{ $stat['icon'] }}
                        </div>

                        <span class="text-slate-300 transition group-hover:translate-x-1 group-hover:text-blue-500">
                            →
                        </span>
                    </div>

                    <p class="mt-5 text-sm font-bold text-slate-500">
                        Total {{ $stat['title'] }}
                    </p>

                    <h2 class="mt-1 text-4xl font-black text-slate-900">
                        {{ $stat['value'] }}
                    </h2>

                    <p class="mt-2 text-xs font-bold text-emerald-600">
                        Klik untuk mengelola
                    </p>
                </a>
            @endforeach
        </section>

        <section class="grid gap-6 xl:grid-cols-3">

            <div class="xl:col-span-2 rounded-[2rem] bg-white p-5 sm:p-6 shadow-xl shadow-slate-200/70 border border-white">
                <div class="mb-5 flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-black">Aksi Cepat</h2>
                        <p class="text-sm text-slate-500">Shortcut pengelolaan konten.</p>
                    </div>
                    <span class="text-3xl">⚡</span>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <a href="{{ route('admin.news.create') }}" class="rounded-3xl bg-blue-50 p-5 text-center transition hover:bg-blue-100">
                        <div class="text-4xl">📰</div>
                        <p class="mt-3 font-black text-blue-700">Tambah Berita</p>
                    </a>

                    <a href="{{ route('admin.announcements.create') }}" class="rounded-3xl bg-orange-50 p-5 text-center transition hover:bg-orange-100">
                        <div class="text-4xl">📢</div>
                        <p class="mt-3 font-black text-orange-700">Pengumuman</p>
                    </a>

                    <a href="{{ route('admin.agendas.create') }}" class="rounded-3xl bg-purple-50 p-5 text-center transition hover:bg-purple-100">
                        <div class="text-4xl">📅</div>
                        <p class="mt-3 font-black text-purple-700">Agenda</p>
                    </a>

                    <a href="{{ route('admin.galleries.create') }}" class="rounded-3xl bg-pink-50 p-5 text-center transition hover:bg-pink-100">
                        <div class="text-4xl">🖼️</div>
                        <p class="mt-3 font-black text-pink-700">Upload Galeri</p>
                    </a>
                </div>
            </div>

            <div class="rounded-[2rem] bg-gradient-to-br from-slate-900 via-blue-900 to-blue-600 p-6 text-white shadow-xl shadow-blue-200">
                <div class="text-4xl">🌙</div>

                <h2 class="mt-5 text-2xl font-black">
                    Quote Hari Ini
                </h2>

                <p class="mt-4 leading-relaxed text-blue-50">
                    “Sebaik-baik manusia adalah yang paling bermanfaat bagi manusia lainnya.”
                </p>

                <p class="mt-4 text-sm font-bold text-blue-200">
                    HR. Ahmad
                </p>
            </div>

        </section>

        <section class="grid gap-6 xl:grid-cols-3">

            <div class="rounded-[2rem] bg-white p-5 sm:p-6 shadow-xl shadow-slate-200/70 border border-white">
                <div class="mb-5 flex items-center justify-between">
                    <h2 class="text-xl font-black">Berita Terbaru</h2>
                    <a href="{{ route('admin.news.index') }}" class="text-sm font-bold text-blue-600">Lihat</a>
                </div>

                <div class="space-y-4">
                    @forelse($latestNews as $item)
                        <a href="{{ route('admin.news.show', $item) }}" class="block rounded-3xl bg-slate-50 p-4 transition hover:bg-blue-50">
                            <h3 class="line-clamp-1 font-black">{{ $item->title }}</h3>
                            <p class="mt-1 text-xs font-bold text-slate-500">🗓️ {{ $item->created_at->format('d M Y') }}</p>
                        </a>
                    @empty
                        <p class="rounded-3xl bg-slate-50 p-4 text-sm text-slate-500">
                            Belum ada berita.
                        </p>
                    @endforelse
                </div>
            </div>

            <div class="rounded-[2rem] bg-white p-5 sm:p-6 shadow-xl shadow-slate-200/70 border border-white">
                <div class="mb-5 flex items-center justify-between">
                    <h2 class="text-xl font-black">Pengumuman</h2>
                    <a href="{{ route('admin.announcements.index') }}" class="text-sm font-bold text-orange-600">Lihat</a>
                </div>

                <div class="space-y-4">
                    @forelse($latestAnnouncements as $item)
                        <a href="{{ route('admin.announcements.show', $item) }}" class="block rounded-3xl bg-orange-50 p-4 transition hover:bg-orange-100">
                            <h3 class="line-clamp-1 font-black">{{ $item->title }}</h3>
                            <p class="mt-1 text-xs font-bold text-orange-600">📢 {{ ucfirst($item->status) }}</p>
                        </a>
                    @empty
                        <p class="rounded-3xl bg-slate-50 p-4 text-sm text-slate-500">
                            Belum ada pengumuman.
                        </p>
                    @endforelse
                </div>
            </div>

            <div class="rounded-[2rem] bg-white p-5 sm:p-6 shadow-xl shadow-slate-200/70 border border-white">
                <div class="mb-5 flex items-center justify-between">
                    <h2 class="text-xl font-black">Agenda Terdekat</h2>
                    <a href="{{ route('admin.agendas.index') }}" class="text-sm font-bold text-purple-600">Lihat</a>
                </div>

                <div class="space-y-4">
                    @forelse($upcomingAgendas as $item)
                        <a href="{{ route('admin.agendas.show', $item) }}" class="flex gap-3 rounded-3xl bg-purple-50 p-4 transition hover:bg-purple-100">
                            <div class="flex h-14 w-14 shrink-0 flex-col items-center justify-center rounded-2xl bg-white text-purple-700">
                                <span class="text-xs font-black">{{ $item->event_date->format('M') }}</span>
                                <span class="text-xl font-black">{{ $item->event_date->format('d') }}</span>
                            </div>

                            <div>
                                <h3 class="line-clamp-1 font-black">{{ $item->title }}</h3>
                                <p class="mt-1 text-xs font-bold text-purple-600">
                                    📍 {{ $item->location ?: 'Lokasi belum diisi' }}
                                </p>
                            </div>
                        </a>
                    @empty
                        <p class="rounded-3xl bg-slate-50 p-4 text-sm text-slate-500">
                            Belum ada agenda terdekat.
                        </p>
                    @endforelse
                </div>
            </div>

        </section>

    </div>
</x-admin-layout>