<section id="berita" class="bg-white px-4 py-24 text-slate-900">

    <div class="mx-auto max-w-7xl">

        <div class="mb-12 flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <div class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-4 py-2 text-sm font-black text-blue-700">
                    📰 BERITA PONDOK
                </div>

                <h2 class="mt-5 text-4xl font-black sm:text-5xl">
                    Kabar Terbaru Assaidiyyah
                </h2>

                <p class="mt-4 max-w-2xl text-lg leading-relaxed text-slate-500">
                    Informasi kegiatan, prestasi, kajian, dan perkembangan terbaru dari Pondok Pesantren Assaidiyyah.
                </p>
            </div>
        </div>

    @if($featuredNews)
    <article class="overflow-hidden rounded-[2rem] bg-gradient-to-br from-blue-950 via-blue-900 to-cyan-800 shadow-2xl shadow-blue-200/60">

        <div class="grid grid-cols-[120px_1fr] sm:grid-cols-[220px_1fr] lg:grid-cols-2">

            {{-- IMAGE --}}
            <a href="{{ route('news.show', $featuredNews) }}"
               class="relative min-h-[190px] overflow-hidden bg-blue-100 sm:min-h-[260px] lg:min-h-[420px]">

                @if($featuredNews->thumbnail)
                    <img
                        src="{{ \Illuminate\Support\Str::startsWith($featuredNews->thumbnail, ['http://', 'https://'])
                            ? $featuredNews->thumbnail
                            : asset('storage/' . $featuredNews->thumbnail) }}"
                        alt="{{ $featuredNews->title }}"
                        class="h-full w-full object-cover transition duration-500 hover:scale-110">
                @else
                    <div class="flex h-full w-full items-center justify-center text-5xl sm:text-7xl">
                        📰
                    </div>
                @endif

                <div class="absolute inset-0 bg-gradient-to-t from-blue-950/50 via-transparent to-transparent"></div>
            </a>

            {{-- CONTENT --}}
            <div class="p-4 text-white sm:p-6 lg:p-10">

                <div class="flex flex-wrap gap-2">
                    <span class="rounded-full bg-yellow-300 px-2.5 py-1 text-[10px] font-black text-yellow-950 sm:px-3 sm:text-xs">
                        ⭐ Utama
                    </span>

                    @if($featuredNews->category)
                        <span class="rounded-full bg-white/15 px-2.5 py-1 text-[10px] font-black text-cyan-100 backdrop-blur sm:px-3 sm:text-xs">
                            🏷️ {{ $featuredNews->category->name }}
                        </span>
                    @endif
                </div>

                <a href="{{ route('news.show', $featuredNews) }}">
                    <h3 class="mt-3 line-clamp-3 text-base font-black leading-tight sm:mt-4 sm:text-2xl lg:text-5xl">
                        {{ $featuredNews->title }}
                    </h3>
                </a>

                <p class="mt-2 line-clamp-2 text-xs leading-relaxed text-blue-100 sm:mt-4 sm:line-clamp-3 sm:text-sm lg:text-base">
                    {{ $featuredNews->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($featuredNews->content), 180) }}
                </p>

                <div class="mt-3 flex flex-wrap gap-2 text-[10px] font-bold text-blue-100 sm:mt-5 sm:text-xs lg:text-sm">
                    <span class="rounded-full bg-white/10 px-2.5 py-1 backdrop-blur">
                        🗓️ {{ $featuredNews->published_at ? $featuredNews->published_at->format('d M Y') : $featuredNews->created_at->format('d M Y') }}
                    </span>

                    <span class="rounded-full bg-white/10 px-2.5 py-1 backdrop-blur">
                        👁️ {{ number_format($featuredNews->views ?? 0) }}
                    </span>

                    @if($featuredNews->author)
                        <span class="hidden rounded-full bg-white/10 px-2.5 py-1 backdrop-blur sm:inline-flex">
                            ✍️ {{ $featuredNews->author->name }}
                        </span>
                    @endif
                </div>

                @if($featuredNews->tags->count())
                    <div class="mt-3 hidden flex-wrap gap-2 sm:flex">
                        @foreach($featuredNews->tags->take(3) as $tag)
                            <span class="rounded-full bg-white/10 px-3 py-1 text-xs font-black text-cyan-200">
                                # {{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                @endif

                <div class="mt-4 sm:mt-6">
                    <a href="{{ route('news.show', $featuredNews) }}"
                       class="inline-flex rounded-xl bg-white px-4 py-2 text-xs font-black text-blue-700 shadow-xl sm:rounded-2xl sm:px-5 sm:py-3 sm:text-sm">
                        Baca →
                    </a>
                </div>

            </div>

        </div>
    </article>
@endif
       <div class="no-scrollbar mt-10 -mx-4 flex gap-5 overflow-x-auto px-4 pb-4 snap-x snap-mandatory scroll-smooth sm:mx-0 sm:grid sm:grid-cols-2 sm:overflow-visible sm:px-0 sm:pb-0 lg:grid-cols-3">
            @forelse($latestNews as $item)
              <article class="group min-w-[55%] snap-start overflow-hidden rounded-[2rem] bg-white shadow-xl sm:min-w-0">
                    <div class="relative h-36 overflow-hidden bg-gradient-to-br from-blue-100 to-cyan-100 sm:h-48 lg:h-56">
                        @if($item->thumbnail)
                            <img src="{{ asset('storage/' . $item->thumbnail) }}"
                                 alt="{{ $item->title }}"
                                 class="h-full w-full object-cover transition duration-500 group-hover:scale-110">
                        @else
                            <div class="flex h-full w-full items-center justify-center text-6xl">
                                📰
                            </div>
                        @endif

                        @if($item->category)
                            <span class="absolute left-4 top-4 rounded-full bg-white/90 px-3 py-1 text-xs font-black text-blue-700">
                                {{ $item->category->name }}
                            </span>
                        @endif
                    </div>

                    <div class="p-5">
                        <div class="flex flex-wrap gap-3 text-xs font-bold text-slate-500">
                            <span>
                                🗓️ {{ $item->published_at ? $item->published_at->format('d M Y') : $item->created_at->format('d M Y') }}
                            </span>

                            <span>
                                👁️ {{ number_format($item->views ?? 0) }}
                            </span>
                        </div>

                        <h3 class="mt-4 line-clamp-2 text-xl font-black leading-snug text-slate-900">
                            {{ $item->title }}
                        </h3>


                        @if($item->author)
                            <div class="mt-5 flex items-center gap-3">
                                @if($item->author->photo)
                                    <img src="{{ asset('storage/' . $item->author->photo) }}"
                                         class="h-10 w-10 rounded-2xl object-cover">
                                @else
                                    <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-blue-50 text-xl">
                                        ✍️
                                    </div>
                                @endif

                                <div>
                                    <p class="text-sm font-black text-slate-900">
                                        {{ $item->author->name }}
                                    </p>

                                    <p class="text-xs font-bold text-slate-500">
                                        {{ $item->author->class_name ?: $item->author->role }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-[2rem] bg-slate-50 p-10 text-center">
                    <div class="text-6xl">📰</div>
                    <h3 class="mt-4 text-2xl font-black">Belum Ada Berita</h3>
                    <p class="mt-2 text-slate-500">Tambahkan berita dari dashboard admin.</p>
                </div>
            @endforelse
        </div>

    </div>

</section>