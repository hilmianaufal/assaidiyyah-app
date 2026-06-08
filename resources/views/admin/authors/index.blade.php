<x-admin-layout>
    <div class="space-y-6">
        <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-cyan-500 via-blue-600 to-indigo-700 p-6 sm:p-8 text-white shadow-2xl shadow-blue-200">
            <div class="absolute right-8 bottom-4 text-7xl opacity-20">✍️</div>

            <div class="relative z-10 flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <div class="inline-flex items-center gap-2 rounded-full bg-white/20 px-4 py-2 text-sm font-bold">
                        ✨ Profil Penulis
                    </div>

                    <h1 class="mt-5 text-3xl sm:text-4xl font-black">
                        Penulis Berita
                    </h1>

                    <p class="mt-2 max-w-xl text-white/90">
                        Kelola profil penulis berita, termasuk foto, kelas, peran, dan biografi.
                    </p>
                </div>

                <a href="{{ route('admin.authors.create') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-2xl bg-white px-5 py-3.5 font-black text-blue-700 shadow-xl">
                    ➕ Tambah Penulis
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="rounded-3xl border border-emerald-100 bg-emerald-50 p-4 text-sm font-bold text-emerald-700">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-3">
            @forelse($authors as $author)
                <div class="rounded-[2rem] bg-white p-5 shadow-xl shadow-slate-200/70 border border-white transition hover:-translate-y-1 hover:shadow-2xl">
                    <div class="flex items-center gap-4">
                        @if($author->photo)
                            <img src="{{ asset('storage/' . $author->photo) }}"
                                 class="h-20 w-20 rounded-3xl object-cover ring-4 ring-blue-100">
                        @else
                            <div class="flex h-20 w-20 items-center justify-center rounded-3xl bg-blue-50 text-4xl ring-4 ring-blue-100">
                                ✍️
                            </div>
                        @endif

                        <div>
                            <h2 class="text-xl font-black text-slate-900">
                                {{ $author->name }}
                            </h2>

                            <p class="mt-1 text-sm font-bold text-slate-500">
                                {{ $author->role ?: 'Penulis Berita' }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-5 grid grid-cols-2 gap-3">
                        <div class="rounded-2xl bg-blue-50 p-3">
                            <p class="text-xs font-bold text-blue-600">Kelas</p>
                            <p class="mt-1 font-black truncate">{{ $author->class_name ?: '-' }}</p>
                        </div>

                        <div class="rounded-2xl bg-cyan-50 p-3">
                            <p class="text-xs font-bold text-cyan-600">Total Berita</p>
                            <p class="mt-1 font-black">{{ $author->news()->count() }}</p>
                        </div>
                    </div>

                    <p class="mt-4 line-clamp-2 text-sm leading-relaxed text-slate-500">
                        {{ $author->bio ?: 'Belum ada biografi penulis.' }}
                    </p>

                    <div class="mt-5 flex items-center justify-between gap-2">
                        <span class="text-xs font-bold text-slate-500">
                            🗓️ {{ $author->created_at->format('d M Y') }}
                        </span>

                        <div class="flex gap-2">
                            <a href="{{ route('admin.authors.show', $author) }}"
                               class="flex h-10 w-10 items-center justify-center rounded-2xl bg-blue-50 text-lg">
                                👁️
                            </a>

                            <a href="{{ route('admin.authors.edit', $author) }}"
                               class="flex h-10 w-10 items-center justify-center rounded-2xl bg-yellow-50 text-lg">
                                ✏️
                            </a>

                            <form action="{{ route('admin.authors.destroy', $author) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus penulis ini?')">
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
                        ✍️
                    </div>

                    <h3 class="mt-5 text-2xl font-black">
                        Belum ada penulis
                    </h3>

                    <p class="mt-2 text-slate-500">
                        Tambahkan penulis pertama untuk berita pondok.
                    </p>

                    <a href="{{ route('admin.authors.create') }}"
                       class="mt-6 inline-flex items-center gap-2 rounded-2xl bg-blue-600 px-5 py-3 font-black text-white shadow-lg shadow-blue-200">
                        ➕ Tambah Penulis
                    </a>
                </div>
            @endforelse
        </div>

        <div>
            {{ $authors->links() }}
        </div>
    </div>
</x-admin-layout>