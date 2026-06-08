<x-admin-layout>
    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('admin.news-categories.index') }}"
               class="inline-flex w-fit items-center gap-2 rounded-2xl bg-white px-4 py-3 font-bold text-slate-600 shadow-sm">
                ← Kembali
            </a>

            <div class="flex gap-2">
                <a href="{{ route('admin.news-categories.edit', $category) }}"
                   class="inline-flex items-center gap-2 rounded-2xl bg-yellow-400 px-5 py-3 font-black text-yellow-950">
                    ✏️ Edit
                </a>

                <form action="{{ route('admin.news-categories.destroy', $category) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                    @csrf
                    @method('DELETE')

                    <button class="inline-flex items-center gap-2 rounded-2xl bg-red-500 px-5 py-3 font-black text-white">
                        🗑️ Hapus
                    </button>
                </form>
            </div>
        </div>

        <article class="overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-200/70">
            <div class="relative p-8 sm:p-10 text-white"
                 style="background: linear-gradient(135deg, {{ $category->color ?: '#2563EB' }}, #7C3AED);">
                <div class="absolute right-8 bottom-4 text-8xl opacity-20">🏷️</div>

                <h1 class="relative z-10 text-3xl sm:text-5xl font-black">
                    {{ $category->name }}
                </h1>

                <p class="relative z-10 mt-3 text-white/85 font-bold">
                    {{ $category->slug }}
                </p>
            </div>

            <div class="grid gap-5 p-6 sm:p-8 md:grid-cols-2">
                <div class="rounded-3xl bg-blue-50 p-5">
                    <div class="text-2xl">🎨</div>
                    <p class="mt-3 text-sm font-bold text-blue-600">Warna</p>
                    <p class="mt-1 font-black text-slate-900">
                        {{ $category->color ?: 'Default' }}
                    </p>
                </div>

                <div class="rounded-3xl bg-purple-50 p-5">
                    <div class="text-2xl">📰</div>
                    <p class="mt-3 text-sm font-bold text-purple-600">Jumlah Berita</p>
                    <p class="mt-1 font-black text-slate-900">
                        {{ $category->news()->count() }}
                    </p>
                </div>

                <div class="rounded-3xl bg-slate-50 p-5 md:col-span-2">
                    <div class="text-2xl">📖</div>
                    <p class="mt-3 text-sm font-bold text-slate-500">Deskripsi</p>
                    <p class="mt-2 leading-relaxed font-medium text-slate-700">
                        {!! nl2br(e($category->description ?: 'Belum ada deskripsi kategori.')) !!}
                    </p>
                </div>
            </div>
        </article>
    </div>
</x-admin-layout>