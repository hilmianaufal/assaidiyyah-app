<section id="prestasi" class="overflow-hidden bg-gradient-to-br from-yellow-50 via-orange-50 to-white px-4 py-16 text-slate-900 sm:py-20">

    <div class="mx-auto max-w-7xl">

        <div class="mb-8 flex items-end justify-between gap-4">
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 rounded-full bg-orange-100 px-4 py-2 text-xs font-black text-orange-700">
                    🏆 PRESTASI SANTRI
                </div>

                <h2 class="mt-4 text-2xl font-black leading-tight sm:text-4xl">
                    Santri Berprestasi, Pondok Menginspirasi
                </h2>

                <p class="mt-3 text-sm leading-relaxed text-slate-500 sm:text-base">
                    Pencapaian santri dalam tahfidz, akademik, seni, bahasa, dan lomba keagamaan.
                </p>
            </div>

            <a href="{{ route('achievements.index') }}"
               class="hidden rounded-2xl bg-white px-5 py-3 text-sm font-black text-orange-700 shadow-lg shadow-orange-100 sm:inline-flex">
                Lihat Semua →
            </a>
        </div>

        <div class="no-scrollbar -mx-4 flex snap-x snap-mandatory gap-4 overflow-x-auto px-4 pb-4 scroll-smooth lg:mx-0 lg:grid lg:grid-cols-3 lg:overflow-visible lg:px-0 lg:pb-0">
            @forelse($achievements as $achievement)
                <article class="group min-w-[78%] snap-start overflow-hidden rounded-[1.75rem] bg-white shadow-xl shadow-orange-100 transition duration-300 hover:-translate-y-1 hover:shadow-2xl sm:min-w-[48%] lg:min-w-0">

                    <div class="relative h-32 overflow-hidden bg-gradient-to-br from-yellow-100 to-orange-100 sm:h-44 lg:h-56">
                        @if($achievement->image)
                            <img
                                src="{{ \Illuminate\Support\Str::startsWith($achievement->image, ['http://', 'https://'])
                                    ? $achievement->image
                                    : asset('storage/' . $achievement->image) }}"
                                alt="{{ $achievement->title }}"
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-110">
                        @else
                            <div class="flex h-full w-full items-center justify-center text-5xl lg:text-7xl">
                                🏆
                            </div>
                        @endif

                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-transparent to-transparent"></div>

                        @if($achievement->level)
                            <span class="absolute left-3 top-3 rounded-full bg-white/90 px-3 py-1 text-[10px] font-black text-orange-700 shadow">
                                🌟 {{ $achievement->level }}
                            </span>
                        @endif
                    </div>

                    <div class="p-4 sm:p-5 lg:p-6">
                        <h3 class="line-clamp-2 text-base font-black leading-tight text-slate-900 sm:text-xl lg:text-2xl">
                            {{ $achievement->title }}
                        </h3>

                        <p class="mt-2 text-xs font-bold text-orange-600 sm:text-sm">
                            👨‍🎓 {{ $achievement->student_name ?: 'Santri Assaidiyyah' }}
                        </p>

                        <p class="mt-3 line-clamp-2 text-xs leading-relaxed text-slate-500 sm:text-sm lg:line-clamp-3">
                            {{ $achievement->description ?: 'Prestasi membanggakan santri Pondok Pesantren Assaidiyyah.' }}
                        </p>

                        <div class="mt-4 flex flex-wrap gap-2 text-[10px] font-bold sm:text-xs">
                            @if($achievement->category)
                                <span class="rounded-full bg-yellow-50 px-3 py-1.5 text-yellow-700">
                                    🏷️ {{ $achievement->category }}
                                </span>
                            @endif

                            @if($achievement->achievement_date)
                                <span class="rounded-full bg-orange-50 px-3 py-1.5 text-orange-700">
                                    📅 {{ $achievement->achievement_date->format('d M Y') }}
                                </span>
                            @endif
                        </div>
                    </div>

                </article>
            @empty
                <div class="min-w-full rounded-[2rem] bg-white p-10 text-center shadow-xl shadow-orange-100">
                    <div class="text-6xl">🏆</div>

                    <h3 class="mt-4 text-2xl font-black">
                        Belum Ada Prestasi
                    </h3>

                    <p class="mt-2 text-slate-500">
                        Tambahkan prestasi santri dari dashboard admin.
                    </p>
                </div>
            @endforelse
        </div>

        <a href="{{ route('achievements.index') }}"
           class="mt-4 flex items-center justify-center rounded-2xl bg-orange-500 px-5 py-3 text-sm font-black text-white shadow-lg shadow-orange-200 sm:hidden">
            Lihat Semua Prestasi →
        </a>

    </div>

</section>