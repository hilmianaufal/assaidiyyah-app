<x-admin-layout>
    <div class="space-y-6">

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('admin.news.index') }}"
               class="inline-flex w-fit items-center gap-2 rounded-2xl bg-white px-4 py-3 font-black text-slate-600 shadow-sm">
                ← Kembali
            </a>

            <div class="flex flex-wrap gap-2">
                <a href="{{ route('news.show', $news) }}"
                   target="_blank"
                   class="inline-flex items-center gap-2 rounded-2xl bg-blue-600 px-5 py-3 font-black text-white shadow-lg shadow-blue-200">
                    🌐 Lihat Publik
                </a>

                <a href="{{ route('admin.news.edit', $news) }}"
                   class="inline-flex items-center gap-2 rounded-2xl bg-yellow-400 px-5 py-3 font-black text-yellow-950 shadow-lg shadow-yellow-100">
                    ✏️ Edit
                </a>

                <form action="{{ route('admin.news.destroy', $news) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                    @csrf
                    @method('DELETE')

                    <button class="inline-flex items-center gap-2 rounded-2xl bg-red-500 px-5 py-3 font-black text-white shadow-lg shadow-red-100">
                        🗑️ Hapus
                    </button>
                </form>
            </div>
        </div>

        <article class="overflow-hidden rounded-[2.5rem] bg-white shadow-2xl shadow-blue-100/70 ring-1 ring-blue-50">

            <div class="relative h-80 overflow-hidden bg-gradient-to-br from-blue-100 to-cyan-100 sm:h-[520px]">
                @if($news->thumbnail)
                    <img
                        src="{{ \Illuminate\Support\Str::startsWith($news->thumbnail, ['http://', 'https://'])
                            ? $news->thumbnail
                            : asset('storage/' . $news->thumbnail) }}"
                        alt="{{ $news->title }}"
                        class="h-full w-full object-cover">
                @else
                    <div class="flex h-full items-center justify-center text-8xl">
                        📰
                    </div>
                @endif

                <div class="absolute inset-0 bg-gradient-to-t from-blue-950/90 via-blue-950/25 to-transparent"></div>

                <div class="absolute bottom-6 left-6 right-6 text-white">
                    <div class="flex flex-wrap gap-2">
                        <span class="rounded-full px-3 py-1.5 text-xs font-black shadow-lg
                            {{ $news->status === 'published' ? 'bg-emerald-500 text-white' : 'bg-yellow-300 text-yellow-950' }}">
                            {{ ucfirst($news->status) }}
                        </span>

                        @if($news->is_featured)
                            <span class="rounded-full bg-yellow-300 px-3 py-1.5 text-xs font-black text-yellow-950 shadow-lg">
                                ⭐ Featured
                            </span>
                        @endif

                        @if($news->category)
                            <span class="rounded-full bg-white/90 px-3 py-1.5 text-xs font-black text-blue-700 shadow-lg">
                                🏷️ {{ $news->category->name }}
                            </span>
                        @endif
                    </div>

                    <h1 class="mt-5 max-w-5xl text-3xl font-black leading-tight sm:text-5xl">
                        {{ $news->title }}
                    </h1>

                    <div class="mt-4 flex flex-wrap gap-3 text-sm font-bold text-blue-50">
                        <span class="rounded-full bg-white/15 px-3 py-1.5 backdrop-blur">
                            🗓️ {{ $news->published_at ? $news->published_at->format('d M Y H:i') : $news->created_at->format('d M Y H:i') }}
                        </span>

                        <span class="rounded-full bg-white/15 px-3 py-1.5 backdrop-blur">
                            👁️ {{ number_format($news->views ?? 0) }} views
                        </span>

                        <span class="rounded-full bg-white/15 px-3 py-1.5 backdrop-blur">
                            🔗 {{ $news->slug }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="grid gap-8 p-5 sm:p-8 lg:grid-cols-[1fr_330px]">

                <main>
                    @if($news->excerpt)
                        <div class="rounded-[2rem] border border-blue-100 bg-blue-50 p-5 font-bold leading-relaxed text-blue-800">
                            💡 {{ $news->excerpt }}
                        </div>
                    @endif

                    <div class="mt-8 rounded-[2rem] bg-white text-slate-700">
                        <div class="space-y-5 text-base leading-8">
                            {!! $news->content !!}
                        </div>
                    </div>

                    <div class="mt-10 rounded-[2rem] bg-slate-50 p-5">
                        <h3 class="font-black text-slate-900">
                            🔎 SEO Berita
                        </h3>

                        <div class="mt-4 grid gap-3 text-sm">
                            <div class="rounded-2xl bg-white p-4">
                                <p class="font-black text-slate-500">Meta Title</p>
                                <p class="mt-1 font-bold text-slate-800">
                                    {{ $news->meta_title ?: '-' }}
                                </p>
                            </div>

                            <div class="rounded-2xl bg-white p-4">
                                <p class="font-black text-slate-500">Meta Description</p>
                                <p class="mt-1 font-bold text-slate-800">
                                    {{ $news->meta_description ?: '-' }}
                                </p>
                            </div>

                            <div class="rounded-2xl bg-white p-4">
                                <p class="font-black text-slate-500">Meta Keywords</p>
                                <p class="mt-1 font-bold text-slate-800">
                                    {{ $news->meta_keywords ?: '-' }}
                                </p>
                            </div>
                        </div>
                    </div>
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
                                        src="{{ \Illuminate\Support\Str::startsWith($news->author->photo, ['http://', 'https://'])
                                            ? $news->author->photo
                                            : asset('storage/' . $news->author->photo) }}"
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

                    @if($news->tags->count())
                        <div class="rounded-[2rem] bg-indigo-50 p-5">
                            <h3 class="font-black text-indigo-700">
                                #️⃣ Tags
                            </h3>

                            <div class="mt-4 flex flex-wrap gap-2">
                                @foreach($news->tags as $tag)
                                    <span class="rounded-full bg-white px-3 py-1 text-xs font-black text-indigo-600 shadow-sm">
                                        # {{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="rounded-[2rem] bg-blue-50 p-5 text-blue-700">
                        <div class="text-3xl">📊</div>

                        <h3 class="mt-3 font-black">
                            Statistik Berita
                        </h3>

                        <div class="mt-4 space-y-3 text-sm font-bold">
                            <div class="rounded-2xl bg-white p-4">
                                👁️ Views: {{ number_format($news->views ?? 0) }}
                            </div>

                            <div class="rounded-2xl bg-white p-4">
                                🚦 Status: {{ ucfirst($news->status) }}
                            </div>

                            <div class="rounded-2xl bg-white p-4 break-all">
                                🔗 Slug: {{ $news->slug }}
                            </div>
                        </div>
                    </div>

                    @if($news->og_image)
                        <div class="rounded-[2rem] bg-slate-50 p-5">
                            <h3 class="font-black text-slate-900">
                                🌐 OG Image
                            </h3>

                            <img
                                src="{{ \Illuminate\Support\Str::startsWith($news->og_image, ['http://', 'https://'])
                                    ? $news->og_image
                                    : asset('storage/' . $news->og_image) }}"
                                alt="OG Image"
                                class="mt-4 h-44 w-full rounded-2xl object-cover shadow">
                        </div>
                    @endif

                </aside>

            </div>

        </article>

    </div>
</x-admin-layout>