<section class="overflow-hidden bg-gradient-to-br from-blue-50 via-white to-cyan-50 px-4 py-16 text-slate-900 sm:py-20">

    <div class="mx-auto max-w-7xl">

        <div class="mb-8 max-w-2xl">
            <div class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-4 py-2 text-xs font-black text-blue-700">
                👳 DEWAN ASATIDZ
            </div>

            <h2 class="mt-4 text-2xl font-black leading-tight sm:text-4xl">
                Ustadz & Pengajar Assaidiyyah
            </h2>

            <p class="mt-3 text-sm leading-relaxed text-slate-500 sm:text-base">
                Dibimbing oleh asatidz yang berpengalaman dalam pendidikan pesantren, tahfidz, diniyah, dan pembinaan akhlak.
            </p>
        </div>

        @if($teachers->count())
            <div class="relative overflow-hidden">
                <div class="pointer-events-none absolute left-0 top-0 z-10 h-full w-16 bg-gradient-to-r from-blue-50 to-transparent"></div>
                <div class="pointer-events-none absolute right-0 top-0 z-10 h-full w-16 bg-gradient-to-l from-cyan-50 to-transparent"></div>

                <div class="teacher-marquee flex w-max gap-4">
                    @foreach($teachers->concat($teachers) as $teacher)
                        <div class="w-[150px] shrink-0 rounded-[1.75rem] bg-white p-3 text-center shadow-xl shadow-blue-100 ring-1 ring-blue-50 sm:w-[210px] sm:p-5">

                            @if($teacher->photo)
                                <img
                                    src="{{ \Illuminate\Support\Str::startsWith($teacher->photo, ['http://', 'https://'])
                                        ? $teacher->photo
                                        : asset('storage/' . $teacher->photo) }}"
                                    alt="{{ $teacher->name }}"
                                    class="mx-auto h-20 w-20 rounded-3xl object-cover ring-4 ring-blue-50 sm:h-28 sm:w-28">
                            @else
                                <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-blue-100 text-4xl sm:h-28 sm:w-28">
                                    👳
                                </div>
                            @endif

                            <h3 class="mt-3 line-clamp-1 text-sm font-black text-slate-900 sm:mt-4 sm:text-lg">
                                {{ $teacher->name }}
                            </h3>

                            <p class="mt-1 line-clamp-1 text-xs font-bold text-blue-600 sm:text-sm">
                                {{ $teacher->position ?: 'Ustadz' }}
                            </p>

                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="rounded-[2rem] bg-white p-10 text-center shadow-xl shadow-blue-100">
                <div class="text-6xl">👳</div>

                <h3 class="mt-4 text-2xl font-black">
                    Belum Ada Data Ustadz
                </h3>

                <p class="mt-2 text-slate-500">
                    Tambahkan data ustadz dari dashboard admin.
                </p>
            </div>
        @endif

    </div>

</section>