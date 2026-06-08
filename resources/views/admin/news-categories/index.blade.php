<x-admin-layout>
    <div class="space-y-6">
        <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-600 p-6 sm:p-8 text-white shadow-2xl shadow-blue-200">
            <div class="absolute right-8 bottom-4 text-7xl opacity-20">🏷️</div>

            <div class="relative z-10 flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <div class="inline-flex items-center gap-2 rounded-full bg-white/20 px-4 py-2 text-sm font-bold">
                        ✨ Klasifikasi Konten
                    </div>

                    <h1 class="mt-5 text-3xl sm:text-4xl font-black">
                        Kategori Berita
                    </h1>

                    <p class="mt-2 max-w-xl text-white/90">
                        Kelola kategori untuk berita seperti Kegiatan, Prestasi, Pengumuman, Kajian, dan PPDB.
                    </p>
                </div>

                <a href="{{ route('admin.news-categories.create') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-2xl bg-white px-5 py-3.5 font-black text-blue-700 shadow-xl">
                    ➕ Tambah Kategori
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="rounded-3xl border border-emerald-100 bg-emerald-50 p-4 text-sm font-bold text-emerald-700">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-3">
            @forelse($categories as $category)
                <div class="rounded-[2rem] bg-white p-5 shadow-xl shadow-slate-200/70 border border-white transition hover:-translate-y-1 hover:shadow-2xl">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div class="flex h-16 w-16 items-center justify-center rounded-3xl text-3xl"
                                 style="background: {{ $category->color ?: '#DBEAFE' }};">
                                🏷️
                            </div>

                            <div>
                                <h2 class="text-xl font-black text-slate-900">
                                    {{ $category->name }}
                                </h2>

                                <p class="mt-1 text-sm font-bold text-slate-500">
                                    {{ $category->slug }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <p class="mt-4 line-clamp-2 text-sm leading-relaxed text-slate-500">
                        {{ $category->description ?: 'Belum ada deskripsi kategori.' }}
                    </p>

                    <div class="mt-5 flex items-center justify-between gap-2">
                        <span class="rounded-full bg-blue-50 px-3 py-1.5 text-xs font-black text-blue-600">
                            📰 {{ $category->news()->count() }} Berita
                        </span>

                        <div class="flex gap-2">
                            <a href="{{ route('admin.news-categories.show', $category) }}"
                               class="flex h-10 w-10 items-center justify-center rounded-2xl bg-blue-50 text-lg">
                                👁️
                            </a>

                            <a href="{{ route('admin.news-categories.edit', $category) }}"
                               class="flex h-10 w-10 items-center justify-center rounded-2xl bg-yellow-50 text-lg">
                                ✏️
                            </a>

                            <form action="{{ route('admin.news-categories.destroy', $category) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                @csrf
                                @method('DELETE')

                                <button class="flex h-10 w-10 items-center justify-center rounded-2xl bg-red-50 text-lg">
                                    🗑️
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="sm:col-span-2 xl:col-span-3 rounded-[2rem] bg-white p-10 text-center shadow-xl shadow-slate-200/70">
                    <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-[2rem] bg-blue-50 text-5xl">
                        🏷️
                    </div>

                    <h3 class="mt-5 text-2xl font-black">
                        Belum ada kategori
                    </h3>

                    <p class="mt-2 text-slate-500">
                        Tambahkan kategori pertama untuk mengelompokkan berita pondok.
                    </p>

                    <a href="{{ route('admin.news-categories.create') }}"
                       class="mt-6 inline-flex items-center gap-2 rounded-2xl bg-blue-600 px-5 py-3 font-black text-white shadow-lg shadow-blue-200">
                        ➕ Tambah Kategori
                    </a>
                </div>
            @endforelse
        </div>

        <div>
            {{ $categories->links() }}
        </div>
    </div>
</x-admin-layout>