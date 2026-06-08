<x-admin-layout>
    <div class="space-y-6">
        <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-slate-900 via-indigo-700 to-blue-600 p-6 sm:p-8 text-white shadow-2xl shadow-blue-200">
            <div class="absolute right-8 bottom-4 text-7xl opacity-20">#️⃣</div>

            <div class="relative z-10 flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <div class="inline-flex items-center gap-2 rounded-full bg-white/20 px-4 py-2 text-sm font-bold">
                        ✨ Label Berita
                    </div>

                    <h1 class="mt-5 text-3xl sm:text-4xl font-black">
                        Tag Berita
                    </h1>

                    <p class="mt-2 max-w-xl text-white/90">
                        Kelola tag untuk menghubungkan berita berdasarkan topik seperti Tahfidz, PPDB, Santri, Alumni, dan Kajian.
                    </p>
                </div>

                <a href="{{ route('admin.news-tags.create') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-2xl bg-white px-5 py-3.5 font-black text-indigo-700 shadow-xl">
                    ➕ Tambah Tag
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="rounded-3xl border border-emerald-100 bg-emerald-50 p-4 text-sm font-bold text-emerald-700">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
            @forelse($tags as $tag)
                <div class="rounded-[2rem] bg-white p-5 shadow-xl shadow-slate-200/70 border border-white transition hover:-translate-y-1 hover:shadow-2xl">
                    <div class="flex h-16 w-16 items-center justify-center rounded-3xl bg-indigo-50 text-3xl">
                        #️⃣
                    </div>

                    <h2 class="mt-4 text-xl font-black text-slate-900">
                        {{ $tag->name }}
                    </h2>

                    <p class="mt-1 text-sm font-bold text-slate-500">
                        {{ $tag->slug }}
                    </p>

                    <div class="mt-4 rounded-2xl bg-blue-50 px-4 py-3 text-sm font-black text-blue-600">
                        📰 {{ $tag->news()->count() }} Berita
                    </div>

                    <div class="mt-5 flex justify-end gap-2">
                        <a href="{{ route('admin.news-tags.show', $tag) }}"
                           class="flex h-10 w-10 items-center justify-center rounded-2xl bg-blue-50 text-lg">
                            👁️
                        </a>

                        <a href="{{ route('admin.news-tags.edit', $tag) }}"
                           class="flex h-10 w-10 items-center justify-center rounded-2xl bg-yellow-50 text-lg">
                            ✏️
                        </a>

                        <form action="{{ route('admin.news-tags.destroy', $tag) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus tag ini?')">
                            @csrf
                            @method('DELETE')

                            <button class="flex h-10 w-10 items-center justify-center rounded-2xl bg-red-50 text-lg">
                                🗑️
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="sm:col-span-2 xl:col-span-4 rounded-[2rem] bg-white p-10 text-center shadow-xl shadow-slate-200/70">
                    <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-[2rem] bg-indigo-50 text-5xl">
                        #️⃣
                    </div>

                    <h3 class="mt-5 text-2xl font-black">
                        Belum ada tag
                    </h3>

                    <p class="mt-2 text-slate-500">
                        Tambahkan tag pertama untuk berita pondok.
                    </p>

                    <a href="{{ route('admin.news-tags.create') }}"
                       class="mt-6 inline-flex items-center gap-2 rounded-2xl bg-indigo-600 px-5 py-3 font-black text-white shadow-lg shadow-indigo-200">
                        ➕ Tambah Tag
                    </a>
                </div>
            @endforelse
        </div>

        <div>
            {{ $tags->links() }}
        </div>
    </div>
</x-admin-layout>