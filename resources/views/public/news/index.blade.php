@extends('layouts.public')

@section('content')

<section class="relative overflow-hidden bg-gradient-to-br from-blue-950 via-blue-800 to-cyan-700 px-4 pb-24 pt-32 text-white">
    <div class="absolute -right-24 top-24 h-80 w-80 rounded-full bg-cyan-300/20 blur-3xl"></div>
    <div class="absolute -left-24 bottom-0 h-80 w-80 rounded-full bg-blue-300/20 blur-3xl"></div>

    <div class="relative z-10 mx-auto max-w-7xl text-center">
        <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm font-black backdrop-blur">
            📰 BERITA PONDOK
        </div>

        <h1 class="mt-6 text-4xl font-black leading-tight sm:text-6xl">
            Berita Assaidiyyah
        </h1>

        <p class="mx-auto mt-5 max-w-2xl text-base leading-relaxed text-blue-50 sm:text-lg">
            Informasi terbaru kegiatan, prestasi, kajian, pengumuman, dan kabar santri Pondok Pesantren Assaidiyyah.
        </p>
    </div>
</section>

<section class="bg-slate-50 px-4 py-16 text-slate-900">
    <div class="mx-auto max-w-7xl">

        <form method="GET"
              class="-mt-28 rounded-[2rem] border border-white bg-white/95 p-4 shadow-2xl shadow-blue-950/10 backdrop-blur sm:p-5">

            <div class="grid gap-3 md:grid-cols-[1fr_260px_140px]">
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">🔎</span>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari berita pondok..."
                        class="w-full rounded-2xl border-slate-200 bg-slate-50 py-4 pl-12 pr-4 font-bold text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:ring-blue-500">
                </div>

                <select
                    name="category"
                    class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-4 font-bold text-slate-700 focus:border-blue-500 focus:ring-blue-500">

                    <option value="">Semua Kategori</option>

                    @foreach($categories as $category)
                        <option value="{{ $category->slug }}" @selected(request('category') == $category->slug)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                <button class="rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 px-6 py-4 font-black text-white shadow-xl shadow-blue-200">
                    Cari
                </button>
            </div>

            @if(request('search') || request('category'))
                <div class="mt-4 flex flex-wrap items-center gap-2 text-sm font-bold text-slate-500">
                    <span>Filter aktif:</span>

                    @if(request('search'))
                        <span class="rounded-full bg-blue-50 px-3 py-1 text-blue-700">
                            “{{ request('search') }}”
                        </span>
                    @endif

                    @if(request('category'))
                        <span class="rounded-full bg-cyan-50 px-3 py-1 text-cyan-700">
                            {{ $categories->firstWhere('slug', request('category'))?->name }}
                        </span>
                    @endif

                    <a href="{{ route('news.index') }}"
                       class="rounded-full bg-red-50 px-3 py-1 text-red-600">
                        Reset
                    </a>
                </div>
            @endif
        </form>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse($news as $item)
                <article class="group overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-200/70 ring-1 ring-slate-100 transition duration-300 hover:-translate-y-2 hover:shadow-2xl">

                    <a href="{{ route('news.show', $item) }}" class="block">
                        <div class="relative h-60 overflow-hidden bg-gradient-to-br from-blue-100 to-cyan-100">
                            @if($item->thumbnail)
                                <img
                                    src="{{ \Illuminate\Support\Str::startsWith($item->thumbnail, ['http://', 'https://'])
                                        ? $item->thumbnail
                                        : asset('storage/' . $item->thumbnail) }}"
                                    alt="{{ $item->title }}"
                                    class="h-full w-full object-cover transition duration-500 group-hover:scale-110">
                            @else
                                <div class="flex h-full w-full items-center justify-center text-7xl">
                                    📰
                                </div>
                            @endif

                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent"></div>

                            @if($item->category)
                                <span class="absolute left-4 top-4 rounded-full bg-white/90 px-3 py-1 text-xs font-black text-blue-700 shadow">
                                    🏷️ {{ $item->category->name }}
                                </span>
                            @endif

                            @if($item->is_featured)
                                <span class="absolute right-4 top-4 rounded-full bg-yellow-300 px-3 py-1 text-xs font-black text-yellow-950 shadow">
                                    ⭐ Utama
                                </span>
                            @endif

                            <div class="absolute bottom-4 left-4 right-4 flex flex-wrap gap-2 text-xs font-bold text-white/90">
                                <span class="rounded-full bg-white/15 px-3 py-1 backdrop-blur">
                                    🗓️ {{ $item->published_at ? $item->published_at->format('d M Y') : $item->created_at->format('d M Y') }}
                                </span>

                                <span class="rounded-full bg-white/15 px-3 py-1 backdrop-blur">
                                    👁️ {{ number_format($item->views ?? 0) }}
                                </span>
                            </div>
                        </div>
                    </a>

                    <div class="p-5">
                        <a href="{{ route('news.show', $item) }}">
                            <h2 class="line-clamp-2 text-xl font-black leading-snug text-slate-900 transition group-hover:text-blue-700">
                                {{ $item->title }}
                            </h2>
                        </a>

                        <p class="mt-3 line-clamp-3 text-sm leading-relaxed text-slate-500">
                            {{ $item->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($item->content), 130) }}
                        </p>

                        @if($item->author)
                            <div class="mt-5 flex items-center gap-3 rounded-2xl bg-slate-50 p-3">
                                @if($item->author->photo)
                                    <img
                                        src="{{ \Illuminate\Support\Str::startsWith($item->author->photo, ['http://', 'https://'])
                                            ? $item->author->photo
                                            : asset('storage/' . $item->author->photo) }}"
                                        alt="{{ $item->author->name }}"
                                        class="h-11 w-11 rounded-2xl object-cover">
                                @else
                                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-100 text-xl">
                                        ✍️
                                    </div>
                                @endif

                                <div class="min-w-0">
                                    <p class="truncate text-sm font-black text-slate-900">
                                        {{ $item->author->name }}
                                    </p>

                                    <p class="truncate text-xs font-bold text-slate-500">
                                        {{ $item->author->class_name ?: ($item->author->role ?: 'Penulis') }}
                                    </p>
                                </div>
                            </div>
                        @endif

                        @if($item->tags->count())
                            <div class="mt-4 flex flex-wrap gap-2">
                                @foreach($item->tags->take(3) as $tag)
                                    <span class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-black text-indigo-600">
                                        # {{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>
                        @endif

                        <div class="mt-5 flex items-center justify-between border-t border-slate-100 pt-4">
                            <span class="text-xs font-bold text-slate-400">
                                {{ $item->created_at->diffForHumans() }}
                            </span>

                            <a href="{{ route('news.show', $item) }}"
                               class="inline-flex items-center gap-2 rounded-full bg-blue-50 px-4 py-2 text-sm font-black text-blue-700 transition hover:bg-blue-600 hover:text-white">
                                Baca →
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-[2rem] bg-white p-12 text-center shadow-xl shadow-slate-200/70">
                    <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-[2rem] bg-blue-50 text-5xl">
                        📰
                    </div>

                    <h3 class="mt-5 text-2xl font-black text-slate-900">
                        Tidak ada berita ditemukan
                    </h3>

                    <p class="mt-2 text-slate-500">
                        Coba gunakan kata kunci atau kategori lain.
                    </p>

                    <a href="{{ route('news.index') }}"
                       class="mt-6 inline-flex rounded-2xl bg-blue-600 px-5 py-3 font-black text-white">
                        Reset Pencarian
                    </a>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $news->links() }}
        </div>

    </div>
</section>

@include('public.partials.cta')
@include('public.partials.footer')

@endsection