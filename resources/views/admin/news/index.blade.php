<x-admin-layout>
    <div class="space-y-6">

        <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-blue-700 via-indigo-600 to-cyan-500 p-6 sm:p-8 text-white shadow-2xl shadow-blue-200">
            <div class="absolute right-8 bottom-4 text-8xl opacity-20">📰</div>

            <div class="relative z-10 flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <div class="inline-flex items-center gap-2 rounded-full bg-white/20 px-4 py-2 text-sm font-bold">
                        ✨ Portal Berita
                    </div>

                    <h1 class="mt-5 text-3xl sm:text-4xl font-black">
                        Berita Pondok
                    </h1>

                    <p class="mt-2 max-w-xl text-blue-50">
                        Kelola artikel lengkap dengan kategori, penulis, tag, featured, dan statistik views.
                    </p>
                </div>

                <a href="{{ route('admin.news.create') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-2xl bg-white px-5 py-3.5 font-black text-blue-700 shadow-xl">
                    ➕ Tambah Berita
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="rounded-3xl border border-emerald-100 bg-emerald-50 p-4 text-sm font-bold text-emerald-700">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-5">
            @forelse($news as $item)
                <div class="group overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-200/70 border border-white transition hover:-translate-y-1 hover:shadow-2xl">
                    <div class="flex flex-col md:flex-row">

                        <div class="relative h-60 md:h-auto md:w-80 shrink-0 bg-gradient-to-br from-blue-100 to-cyan-100 overflow-hidden">
                            @if($item->thumbnail)
                                <img src="{{ asset('storage/' . $item->thumbnail) }}"
                                     class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            @else
                                <div class="flex h-full w-full items-center justify-center text-7xl">📰</div>
                            @endif

                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent"></div>

                            <div class="absolute left-4 top-4 flex flex-wrap gap-2">
                                <span class="rounded-full px-3 py-1 text-xs font-black
                                    {{ $item->status === 'published' ? 'bg-emerald-500 text-white' : 'bg-yellow-400 text-yellow-950' }}">
                                    {{ ucfirst($item->status) }}
                                </span>

                                @if($item->is_featured)
                                    <span class="rounded-full bg-yellow-300 px-3 py-1 text-xs font-black text-yellow-950">
                                        ⭐ Featured
                                    </span>
                                @endif
                            </div>

                            @if($item->category)
                                <span class="absolute right-4 top-4 rounded-full bg-white/90 px-3 py-1 text-xs font-black text-blue-700">
                                    🏷️ {{ $item->category->name }}
                                </span>
                            @endif
                        </div>

                        <div class="flex-1 p-5 sm:p-6">
                            <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">

                                <div class="max-w-3xl">
                                    <h2 class="text-xl sm:text-2xl font-black text-slate-900">
                                        {{ $item->title }}
                                    </h2>

                                    <p class="mt-3 line-clamp-2 text-sm leading-relaxed text-slate-500">
                                        {{ $item->excerpt ?: Str::limit(strip_tags($item->content), 150) }}
                                    </p>

                                    <div class="mt-5 flex flex-wrap gap-2 text-xs font-bold">
                                        <span class="rounded-full bg-slate-100 px-3 py-1.5 text-slate-600">
                                            🗓️ {{ $item->published_at ? $item->published_at->format('d M Y') : $item->created_at->format('d M Y') }}
                                        </span>

                                        <span class="rounded-full bg-blue-50 px-3 py-1.5 text-blue-600">
                                            👁️ {{ number_format($item->views ?? 0) }} views
                                        </span>

                                        @if($item->author)
                                            <span class="rounded-full bg-cyan-50 px-3 py-1.5 text-cyan-600">
                                                ✍️ {{ $item->author->name }}
                                            </span>
                                        @endif

                                        @if($item->author?->class_name)
                                            <span class="rounded-full bg-indigo-50 px-3 py-1.5 text-indigo-600">
                                                🏫 {{ $item->author->class_name }}
                                            </span>
                                        @endif
                                    </div>

                                    @if($item->tags->count())
                                        <div class="mt-4 flex flex-wrap gap-2">
                                            @foreach($item->tags as $tag)
                                                <span class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-black text-indigo-600">
                                                    # {{ $tag->name }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <div class="flex shrink-0 gap-2">
                                    <a href="{{ route('admin.news.show', $item) }}"
                                       class="flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-50 text-lg">
                                        👁️
                                    </a>

                                    <a href="{{ route('admin.news.edit', $item) }}"
                                       class="flex h-11 w-11 items-center justify-center rounded-2xl bg-yellow-50 text-lg">
                                        ✏️
                                    </a>

                                    <form action="{{ route('admin.news.destroy', $item) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button class="flex h-11 w-11 items-center justify-center rounded-2xl bg-red-50 text-lg">
                                            🗑️
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <div class="rounded-[2rem] bg-white p-10 text-center shadow-xl shadow-slate-200/70">
                    <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-[2rem] bg-blue-50 text-5xl">
                        📰
                    </div>

                    <h3 class="mt-5 text-2xl font-black">
                        Belum ada berita
                    </h3>

                    <p class="mt-2 text-slate-500">
                        Tambahkan berita pertama untuk website pesantren.
                    </p>
                </div>
            @endforelse
        </div>

        <div>
            {{ $news->links() }}
        </div>

    </div>
</x-admin-layout>