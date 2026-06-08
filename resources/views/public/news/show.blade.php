@extends('layouts.public')

@section('content')

<section class="relative overflow-hidden bg-gradient-to-br from-blue-50 via-white to-cyan-50 px-4 pb-20 pt-32 text-slate-900">

    <div class="absolute -right-24 top-24 h-80 w-80 rounded-full bg-cyan-200/50 blur-3xl"></div>
    <div class="absolute -left-24 bottom-24 h-80 w-80 rounded-full bg-blue-200/50 blur-3xl"></div>

    <div class="relative z-10 mx-auto max-w-6xl">

        <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
            <a href="{{ route('news.index') }}"
               class="inline-flex items-center gap-2 rounded-2xl bg-white px-5 py-3 font-black text-blue-700 shadow-xl shadow-blue-100">
                ← Semua Berita
            </a>

            <a href="{{ route('home') }}"
               class="inline-flex items-center gap-2 rounded-2xl bg-blue-50 px-5 py-3 font-black text-blue-700">
                🏠 Beranda
            </a>
        </div>

        <article class="overflow-hidden rounded-[2.5rem] bg-white shadow-2xl shadow-blue-100/80 ring-1 ring-blue-50">

            <div class="relative overflow-hidden bg-gradient-to-br from-blue-100 to-cyan-100">
                <div class="aspect-[16/10] sm:aspect-[16/9] lg:h-[560px] lg:aspect-auto">
                    @if($news->thumbnail)
                        <img
                            src="{{ \Illuminate\Support\Str::startsWith($news->thumbnail, ['http://', 'https://']) ? $news->thumbnail : asset('storage/' . $news->thumbnail) }}"
                            alt="{{ $news->title }}"
                            class="h-full w-full object-cover">
                    @else
                        <div class="flex h-full w-full items-center justify-center text-6xl sm:text-8xl">
                            📰
                        </div>
                    @endif
                </div>

                <div class="absolute inset-0 bg-gradient-to-t from-blue-950/90 via-blue-950/25 to-transparent"></div>

                <div class="absolute bottom-0 left-0 right-0 p-4 sm:p-8 lg:p-10">
                    <div class="flex flex-wrap gap-2">
                        @if($news->category)
                            <span class="rounded-full bg-white/95 px-3 py-1.5 text-[10px] font-black text-blue-700 shadow-lg sm:px-4 sm:py-2 sm:text-xs">
                                🏷️ {{ $news->category->name }}
                            </span>
                        @endif

                        @if($news->is_featured)
                            <span class="rounded-full bg-yellow-300 px-3 py-1.5 text-[10px] font-black text-yellow-950 shadow-lg sm:px-4 sm:py-2 sm:text-xs">
                                ⭐ Berita Utama
                            </span>
                        @endif
                    </div>

                    <h1 class="mt-4 max-w-5xl text-xl font-black leading-tight text-white sm:text-4xl lg:text-6xl">
                        {{ $news->title }}
                    </h1>

                    <div class="mt-4 flex flex-wrap gap-2 text-[11px] font-bold text-blue-50 sm:gap-3 sm:text-sm">
                        <span class="rounded-full bg-white/15 px-3 py-1.5 backdrop-blur">
                            🗓️ {{ $news->published_at ? $news->published_at->format('d M Y') : $news->created_at->format('d M Y') }}
                        </span>

                        <span class="rounded-full bg-white/15 px-3 py-1.5 backdrop-blur">
                            👁️ {{ number_format($news->views ?? 0) }} views
                        </span>

                        @if($news->author)
                            <span class="rounded-full bg-white/15 px-3 py-1.5 backdrop-blur">
                                ✍️ {{ $news->author->name }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="grid gap-8 p-5 sm:p-8 lg:grid-cols-[1fr_320px]">

                <main>
                    @if($news->excerpt)
                        <div class="rounded-[2rem] border border-blue-100 bg-blue-50 p-5 text-sm font-bold leading-relaxed text-blue-800 sm:text-lg">
                            💡 {{ $news->excerpt }}
                        </div>
                    @endif

                    <div class="mt-8 rounded-[2rem] bg-white leading-relaxed text-slate-700">
                        <div class="space-y-5 text-base leading-8 sm:text-lg">
                            {!! $news->content !!}
                        </div>
                    </div>

                    @if($news->tags->count())
                        <div class="mt-10 rounded-[2rem] bg-indigo-50 p-5">
                            <h3 class="font-black text-indigo-700">
                                #️⃣ Tag Berita
                            </h3>

                            <div class="mt-4 flex flex-wrap gap-2">
                                @foreach($news->tags as $tag)
                                    <span class="rounded-full bg-white px-4 py-2 text-xs font-black text-indigo-600 shadow-sm">
                                        # {{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </main>

                <aside class="space-y-5">

                    @if($news->author)
                        <div class="rounded-[2rem] bg-gradient-to-br from-blue-600 to-cyan-500 p-5 text-white shadow-xl shadow-blue-100">
                            <p class="text-sm font-black text-blue-100">
                                ✍️ Penulis
                            </p>

                            <div class="mt-5 flex items-center gap-4">
                                @if($news->author->photo)
                                    <img
                                        src="{{ \Illuminate\Support\Str::startsWith($news->author->photo, ['http://', 'https://']) ? $news->author->photo : asset('storage/' . $news->author->photo) }}"
                                        alt="{{ $news->author->name }}"
                                        class="h-20 w-20 rounded-3xl object-cover ring-4 ring-white/20">
                                @else
                                    <div class="flex h-20 w-20 items-center justify-center rounded-3xl bg-white/20 text-4xl">
                                        ✍️
                                    </div>
                                @endif

                                <div>
                                    <h3 class="text-lg font-black">
                                        {{ $news->author->name }}
                                    </h3>

                                    <p class="text-sm font-bold text-blue-100">
                                        {{ $news->author->class_name ?: ($news->author->role ?: 'Penulis Berita') }}
                                    </p>
                                </div>
                            </div>

                            @if($news->author->bio)
                                <p class="mt-5 text-sm leading-relaxed text-blue-50">
                                    {{ $news->author->bio }}
                                </p>
                            @endif
                        </div>
                    @endif

                    <div class="rounded-[2rem] bg-white p-5 shadow-xl shadow-blue-100 ring-1 ring-blue-50">
                        <h3 class="font-black text-slate-900">
                            📊 Statistik Artikel
                        </h3>

                        <div class="mt-4 grid gap-3 text-sm font-bold">
                            <div class="rounded-2xl bg-blue-50 p-4 text-blue-700">
                                👁️ {{ number_format($news->views ?? 0) }} Pembaca
                            </div>

                            <div class="rounded-2xl bg-cyan-50 p-4 text-cyan-700">
                                🗓️ {{ $news->published_at ? $news->published_at->diffForHumans() : $news->created_at->diffForHumans() }}
                            </div>

                            @if($news->category)
                                <div class="rounded-2xl bg-indigo-50 p-4 text-indigo-700">
                                    🏷️ {{ $news->category->name }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="rounded-[2rem] bg-blue-50 p-5 text-blue-800">
                        <div class="text-4xl">
                            🕌
                        </div>

                        <h3 class="mt-4 text-xl font-black">
                            PPDB Assaidiyyah
                        </h3>

                        <p class="mt-2 text-sm leading-relaxed text-blue-700">
                            Daftarkan calon santri baru Pondok Pesantren Assaidiyyah secara online.
                        </p>

                        <a href="{{ route('ppdb.create') }}"
                           class="mt-5 inline-flex w-full justify-center rounded-2xl bg-blue-600 px-5 py-3 font-black text-white shadow-lg shadow-blue-200">
                            Daftar PPDB
                        </a>
                    </div>

                </aside>

            </div>

        </article>

        @if($relatedNews->count())
            <section class="mt-14">
                <div class="mb-6 flex items-end justify-between gap-4">
                    <div>
                        <p class="font-black text-blue-600">
                            📰 BERITA TERKAIT
                        </p>

                        <h2 class="mt-2 text-3xl font-black text-slate-900 sm:text-4xl">
                            Artikel Lainnya
                        </h2>
                    </div>

                    <a href="{{ route('news.index') }}"
                       class="hidden rounded-2xl bg-white px-5 py-3 font-black text-blue-700 shadow-lg sm:inline-flex">
                        Lihat Semua
                    </a>
                </div>

                <div class="grid gap-5 sm:grid-cols-3">
                    @foreach($relatedNews as $item)
                        <a href="{{ route('news.show', $item) }}"
                           class="group overflow-hidden rounded-[2rem] bg-white text-slate-900 shadow-xl shadow-blue-100 ring-1 ring-blue-50 transition hover:-translate-y-1 hover:shadow-2xl">

                            <div class="relative aspect-[16/10] overflow-hidden bg-gradient-to-br from-blue-100 to-cyan-100 sm:aspect-auto sm:h-44">
                                @if($item->thumbnail)
                                    <img
                                        src="{{ \Illuminate\Support\Str::startsWith($item->thumbnail, ['http://', 'https://']) ? $item->thumbnail : asset('storage/' . $item->thumbnail) }}"
                                        alt="{{ $item->title }}"
                                        class="h-full w-full object-cover transition duration-500 group-hover:scale-110">
                                @else
                                    <div class="flex h-full items-center justify-center text-5xl">
                                        📰
                                    </div>
                                @endif
                            </div>

                            <div class="p-5">
                                @if($item->category)
                                    <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-black text-blue-700">
                                        {{ $item->category->name }}
                                    </span>
                                @endif

                                <h3 class="mt-3 line-clamp-2 font-black leading-snug">
                                    {{ $item->title }}
                                </h3>

                                <p class="mt-3 text-xs font-bold text-slate-400">
                                    {{ $item->published_at ? $item->published_at->format('d M Y') : $item->created_at->format('d M Y') }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif

    </div>

</section>

@include('public.partials.cta')
@include('public.partials.footer')

@endsection