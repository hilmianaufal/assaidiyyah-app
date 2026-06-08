<section class="overflow-hidden bg-white px-4 py-16 text-slate-900 sm:py-20">

    <div class="mx-auto max-w-7xl">

        <div class="mb-8 max-w-2xl">
            <div class="inline-flex items-center gap-2 rounded-full bg-pink-100 px-4 py-2 text-xs font-black text-pink-700">
                💬 TESTIMONI
            </div>

            <h2 class="mt-4 text-2xl font-black leading-tight sm:text-4xl">
                Apa Kata Mereka?
            </h2>

            <p class="mt-3 text-sm leading-relaxed text-slate-500 sm:text-base">
                Cerita wali santri, alumni, dan masyarakat tentang Pondok Pesantren Assaidiyyah.
            </p>
        </div>

        @if($testimonials->count())
            <div class="relative overflow-hidden">
                <div class="pointer-events-none absolute left-0 top-0 z-10 h-full w-16 bg-gradient-to-r from-white to-transparent"></div>
                <div class="pointer-events-none absolute right-0 top-0 z-10 h-full w-16 bg-gradient-to-l from-white to-transparent"></div>

                <div class="testimonial-marquee flex w-max gap-4">
                    @foreach($testimonials->concat($testimonials) as $testimonial)
                        <div class="w-[260px] shrink-0 rounded-[1.75rem] bg-slate-50 p-5 shadow-xl shadow-slate-100 ring-1 ring-slate-100 sm:w-[320px]">

                            <div class="text-base text-yellow-400 sm:text-lg">
                                @for($i = 1; $i <= 5; $i++)
                                    {{ $i <= ($testimonial->rating ?? 5) ? '★' : '☆' }}
                                @endfor
                            </div>

                            <p class="mt-4 line-clamp-4 text-sm leading-relaxed text-slate-600">
                                "{{ $testimonial->message }}"
                            </p>

                            <div class="mt-5 flex items-center gap-3">
                                @if($testimonial->photo)
                                    <img
                                        src="{{ \Illuminate\Support\Str::startsWith($testimonial->photo, ['http://', 'https://'])
                                            ? $testimonial->photo
                                            : asset('storage/' . $testimonial->photo) }}"
                                        alt="{{ $testimonial->name }}"
                                        class="h-11 w-11 rounded-2xl object-cover sm:h-12 sm:w-12">
                                @else
                                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-pink-100 text-xl sm:h-12 sm:w-12">
                                        👤
                                    </div>
                                @endif

                                <div class="min-w-0">
                                    <h3 class="truncate text-sm font-black text-slate-900">
                                        {{ $testimonial->name }}
                                    </h3>

                                    <p class="truncate text-xs font-semibold text-slate-500">
                                        {{ $testimonial->role ?? 'Wali Santri' }}
                                    </p>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="rounded-[2rem] bg-slate-50 p-10 text-center">
                <div class="text-6xl">💬</div>

                <h3 class="mt-4 text-2xl font-black">
                    Belum Ada Testimoni
                </h3>

                <p class="mt-2 text-slate-500">
                    Tambahkan testimoni dari dashboard admin.
                </p>
            </div>
        @endif

    </div>

</section>