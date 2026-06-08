<section class="relative -mt-0 min-h-screen w-full overflow-hidden bg-gradient-to-br from-blue-950 via-blue-800 to-cyan-700 px-4 pb-20 pt-32 text-white">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_rgba(255,255,255,.25),_transparent_35%)]"></div>
    <div class="absolute -right-24 top-28 h-80 w-80 rounded-full bg-cyan-300/20 blur-3xl"></div>
    <div class="absolute -left-24 bottom-12 h-80 w-80 rounded-full bg-blue-300/20 blur-3xl"></div>

    <div class="relative z-10 mx-auto grid max-w-7xl items-center gap-12 lg:grid-cols-2">

        <div class="js-hero">
            <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm font-bold backdrop-blur">
                ✨ Pesantren Modern Berbasis Al-Qur'an
            </div>

            <h1 class="mt-6 text-4xl font-black leading-tight sm:text-6xl lg:text-7xl">
                {{ $setting?->site_name ?? 'Pondok Pesantren Assaidiyyah' }}
            </h1>

            <p class="mt-5 max-w-xl text-base leading-relaxed text-blue-50 sm:text-lg">
                {{ $setting?->tagline ?? 'Membentuk generasi Qurani, berakhlak mulia, berilmu, mandiri, dan siap menghadapi masa depan.' }}
            </p>

            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <a href="{{ route('ppdb.create') }}"
                   class="inline-flex items-center justify-center rounded-2xl bg-white px-6 py-4 font-black text-blue-700 shadow-2xl shadow-blue-950/20">
                    📝 Daftar PPDB
                </a>

                <a href="#berita"
                   class="inline-flex items-center justify-center rounded-2xl border border-white/20 bg-white/10 px-6 py-4 font-black text-white backdrop-blur">
                    📰 Lihat Berita
                </a>
            </div>

            <div class="mt-10 grid grid-cols-3 gap-3">
                <div class="rounded-3xl bg-white/10 p-4 backdrop-blur">
                    <h3 class="text-2xl font-black">{{ $programs->count() }}+</h3>
                    <p class="text-xs text-blue-100">Program</p>
                </div>

                <div class="rounded-3xl bg-white/10 p-4 backdrop-blur">
                    <h3 class="text-2xl font-black">{{ $latestNews->count() }}+</h3>
                    <p class="text-xs text-blue-100">Berita</p>
                </div>

                <div class="rounded-3xl bg-white/10 p-4 backdrop-blur">
                    <h3 class="text-2xl font-black">{{ $achievements->count() }}+</h3>
                    <p class="text-xs text-blue-100">Prestasi</p>
                </div>
            </div>
        </div>

        <div class="js-hero relative">
            <div class="rounded-[2.5rem] border border-white/10 bg-white/10 p-4 shadow-2xl backdrop-blur-xl">
                @if($setting?->hero_image)
                    <img src="{{ asset('storage/' . $setting->hero_image) }}"
                         class="h-[420px] w-full rounded-[2rem] object-cover">
                @else
                    <div class="flex h-[420px] w-full items-center justify-center rounded-[2rem] bg-gradient-to-br from-white/20 to-white/5 text-9xl">
                        🕌
                    </div>
                @endif
            </div>

            <div class="absolute -bottom-6 left-6 right-6 rounded-3xl bg-white p-5 text-slate-900 shadow-2xl">
                <p class="text-sm font-bold text-slate-500">
                    Agenda Terdekat
                </p>

                @forelse($agendas as $agenda)
                    <h3 class="mt-2 font-black">
                        {{ $agenda->title }}
                    </h3>

                    <p class="mt-1 text-sm font-bold text-blue-600">
                        📅 {{ $agenda->event_date->format('d M Y') }}
                    </p>

                    @break
                @empty
                    <h3 class="mt-2 font-black">
                        Belum ada agenda
                    </h3>
                @endforelse
            </div>
        </div>

    </div>

</section>