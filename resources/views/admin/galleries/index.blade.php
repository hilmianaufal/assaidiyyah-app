<x-admin-layout>
    <div class="space-y-6">

        <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-pink-500 via-rose-500 to-orange-400 p-6 sm:p-8 text-white shadow-2xl shadow-pink-200">
            <div class="absolute right-8 bottom-4 text-7xl opacity-20">🖼️</div>

            <div class="relative z-10 flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <div class="inline-flex items-center gap-2 rounded-full bg-white/20 px-4 py-2 text-sm font-bold">
                        ✨ Dokumentasi Pondok
                    </div>

                    <h1 class="mt-5 text-3xl sm:text-4xl font-black">
                        Galeri
                    </h1>

                    <p class="mt-2 max-w-xl text-white/90">
                        Kelola foto kegiatan, fasilitas, santri, dan dokumentasi Pondok Pesantren Assaidiyyah.
                    </p>
                </div>

                <a href="{{ route('admin.galleries.create') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-2xl bg-white px-5 py-3.5 font-black text-pink-600 shadow-xl">
                    ➕ Tambah Foto
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="rounded-3xl border border-emerald-100 bg-emerald-50 p-4 text-sm font-bold text-emerald-700">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-3">
            @forelse($galleries as $item)
                <div class="group overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-200/70 border border-white transition hover:-translate-y-1 hover:shadow-2xl">
                    <div class="relative h-64 overflow-hidden bg-pink-50">
                        <img src="{{ asset('storage/' . $item->image) }}"
                             alt="{{ $item->title }}"
                             class="h-full w-full object-cover transition duration-500 group-hover:scale-105">

                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent"></div>

                        <span class="absolute left-4 top-4 rounded-full px-3 py-1 text-xs font-black
                            {{ $item->status === 'published' ? 'bg-emerald-500 text-white' : 'bg-yellow-400 text-yellow-950' }}">
                            {{ ucfirst($item->status) }}
                        </span>

                        @if($item->category)
                            <span class="absolute right-4 top-4 rounded-full bg-white/90 px-3 py-1 text-xs font-black text-pink-600">
                                🏷️ {{ $item->category }}
                            </span>
                        @endif

                        <div class="absolute bottom-4 left-4 right-4 text-white">
                            <h2 class="text-xl font-black">
                                {{ $item->title }}
                            </h2>

                            <p class="mt-1 line-clamp-2 text-sm text-white/80">
                                {{ $item->description ?: 'Tidak ada deskripsi.' }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between gap-2 p-4">
                        <span class="text-xs font-bold text-slate-500">
                            🗓️ {{ $item->created_at->format('d M Y') }}
                        </span>

                        <div class="flex gap-2">
                            <a href="{{ route('admin.galleries.show', $item) }}"
                               class="flex h-10 w-10 items-center justify-center rounded-2xl bg-blue-50 text-lg">
                                👁️
                            </a>

                            <a href="{{ route('admin.galleries.edit', $item) }}"
                               class="flex h-10 w-10 items-center justify-center rounded-2xl bg-yellow-50 text-lg">
                                ✏️
                            </a>

                            <form action="{{ route('admin.galleries.destroy', $item) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
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
                    <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-[2rem] bg-pink-50 text-5xl">
                        🖼️
                    </div>

                    <h3 class="mt-5 text-2xl font-black">
                        Belum ada galeri
                    </h3>

                    <p class="mt-2 text-slate-500">
                        Tambahkan foto pertama untuk dokumentasi pondok.
                    </p>

                    <a href="{{ route('admin.galleries.create') }}"
                       class="mt-6 inline-flex items-center gap-2 rounded-2xl bg-pink-500 px-5 py-3 font-black text-white shadow-lg shadow-pink-200">
                        ➕ Tambah Foto
                    </a>
                </div>
            @endforelse
        </div>

        <div>
            {{ $galleries->links() }}
        </div>

    </div>
</x-admin-layout>