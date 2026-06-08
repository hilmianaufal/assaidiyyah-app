<section id="galeri" class="overflow-hidden bg-slate-950 px-4 py-16 text-white sm:py-20">

    <div class="mx-auto max-w-7xl">

        <div class="mb-8 flex items-end justify-between gap-4">
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 text-xs font-black text-cyan-300">
                    🖼️ GALERI PONDOK
                </div>

                <h2 class="mt-4 text-2xl font-black leading-tight sm:text-4xl">
                    Dokumentasi Kegiatan Santri
                </h2>

                <p class="mt-3 text-sm leading-relaxed text-slate-400 sm:text-base">
                    Momen kegiatan, pembelajaran, acara pondok, dan keseharian santri Assaidiyyah.
                </p>
            </div>

            <a href="{{ route('gallery.index') }}"
               class="hidden rounded-2xl bg-white/10 px-5 py-3 text-sm font-black text-cyan-200 shadow-lg shadow-cyan-950/20 transition hover:bg-white hover:text-blue-700 sm:inline-flex">
                Lihat Semua →
            </a>
        </div>

        <div class="no-scrollbar -mx-4 flex gap-3 overflow-x-auto px-4 pb-3 scroll-smooth lg:mx-0 lg:grid lg:grid-cols-3 lg:overflow-visible lg:px-0 lg:pb-0">

            @forelse($galleries as $gallery)
                <article class="group min-w-[32%] overflow-hidden rounded-[1.5rem] bg-white/5 shadow-xl shadow-black/20 ring-1 ring-white/10 backdrop-blur-sm transition duration-300 hover:-translate-y-1 hover:bg-white/10 hover:ring-cyan-300/30 sm:min-w-[30%] lg:min-w-0">

                    <div class="relative overflow-hidden bg-white/10">
                        @if($gallery->image)
                            <img
                                src="{{ \Illuminate\Support\Str::startsWith($gallery->image, ['http://', 'https://'])
                                    ? $gallery->image
                                    : asset('storage/' . $gallery->image) }}"
                                alt="{{ $gallery->title }}"
                                class="h-24 w-full object-cover transition duration-500 group-hover:scale-110 sm:h-32 lg:h-56">
                        @else
                            <div class="flex h-24 w-full items-center justify-center text-4xl sm:h-32 lg:h-56 lg:text-7xl">
                                🖼️
                            </div>
                        @endif

                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent opacity-0 transition duration-300 group-hover:opacity-100"></div>

                        @if($gallery->category)
                            <span class="absolute left-2 top-2 rounded-full bg-white/90 px-2 py-0.5 text-[9px] font-black text-blue-700 shadow sm:px-3 sm:py-1 sm:text-[10px] lg:text-xs">
                                {{ $gallery->category }}
                            </span>
                        @endif
                    </div>

                    <div class="p-2 sm:p-3 lg:p-4">
                        <h3 class="line-clamp-2 text-[10px] font-bold leading-tight text-white sm:text-xs lg:text-base lg:font-black">
                            {{ $gallery->title }}
                        </h3>

                        <p class="mt-1 hidden text-[10px] font-semibold text-slate-400 sm:block lg:text-xs">
                            📅 {{ $gallery->created_at->format('d M Y') }}
                        </p>
                    </div>

                </article>
            @empty
                <div class="min-w-full rounded-[2rem] bg-white/10 p-10 text-center shadow-xl">
                    <div class="text-6xl">🖼️</div>

                    <h3 class="mt-4 text-2xl font-black">
                        Belum Ada Galeri
                    </h3>

                    <p class="mt-2 text-slate-400">
                        Tambahkan foto galeri dari dashboard admin.
                    </p>
                </div>
            @endforelse

        </div>

        <a href="{{ route('gallery.index') }}"
           class="mt-5 flex items-center justify-center rounded-2xl bg-cyan-500 px-5 py-3 text-sm font-black text-white shadow-lg shadow-cyan-950/20 sm:hidden">
            Lihat Semua Galeri →
        </a>

    </div>

</section>