<x-admin-layout>
    <div class="space-y-6">

        <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-orange-500 via-red-500 to-pink-500 p-6 sm:p-8 text-white shadow-2xl shadow-orange-200">
            <div class="absolute right-8 bottom-4 text-7xl opacity-20">📢</div>

            <div class="relative z-10 flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <div class="inline-flex items-center gap-2 rounded-full bg-white/20 px-4 py-2 text-sm font-bold">
                        ✨ Informasi Penting
                    </div>

                    <h1 class="mt-5 text-3xl sm:text-4xl font-black">
                        Pengumuman
                    </h1>

                    <p class="mt-2 max-w-xl text-white/90">
                        Kelola pengumuman resmi Pondok Pesantren Assaidiyyah.
                    </p>
                </div>

                <a href="{{ route('admin.announcements.create') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-2xl bg-white px-5 py-3.5 font-black text-orange-600 shadow-xl">
                    ➕ Tambah Pengumuman
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="rounded-3xl border border-emerald-100 bg-emerald-50 p-4 text-sm font-bold text-emerald-700">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-4">
            @forelse($announcements as $item)
                <div class="rounded-[2rem] bg-white p-5 shadow-xl shadow-slate-200/70 border border-white">
                    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                        <div>
                            <div class="flex items-center gap-3">
                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-orange-50 text-2xl">
                                    📢
                                </div>

                                <div>
                                    <h2 class="text-lg sm:text-xl font-black">
                                        {{ $item->title }}
                                    </h2>

                                    <p class="mt-1 text-sm text-slate-500">
                                        🗓️ {{ $item->published_at ? $item->published_at->format('d M Y') : 'Belum dijadwalkan' }}
                                    </p>
                                </div>
                            </div>

                            <p class="mt-4 line-clamp-2 text-sm leading-relaxed text-slate-500">
                                {{ $item->content }}
                            </p>
                        </div>

                        <div class="flex items-center gap-2">
                            <span class="rounded-full px-3 py-1 text-xs font-black
                                {{ $item->status === 'published' ? 'bg-emerald-50 text-emerald-600' : 'bg-yellow-50 text-yellow-600' }}">
                                {{ ucfirst($item->status) }}
                            </span>

                            <a href="{{ route('admin.announcements.show', $item) }}"
                               class="flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-50 text-lg">
                                👁️
                            </a>

                            <a href="{{ route('admin.announcements.edit', $item) }}"
                               class="flex h-11 w-11 items-center justify-center rounded-2xl bg-yellow-50 text-lg">
                                ✏️
                            </a>

                            <form action="{{ route('admin.announcements.destroy', $item) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')">
                                @csrf
                                @method('DELETE')

                                <button class="flex h-11 w-11 items-center justify-center rounded-2xl bg-red-50 text-lg">
                                    🗑️
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="rounded-[2rem] bg-white p-10 text-center shadow-xl shadow-slate-200/70">
                    <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-[2rem] bg-orange-50 text-5xl">
                        📢
                    </div>

                    <h3 class="mt-5 text-2xl font-black">
                        Belum ada pengumuman
                    </h3>

                    <p class="mt-2 text-slate-500">
                        Tambahkan pengumuman pertama untuk website pondok.
                    </p>

                    <a href="{{ route('admin.announcements.create') }}"
                       class="mt-6 inline-flex items-center gap-2 rounded-2xl bg-orange-500 px-5 py-3 font-black text-white shadow-lg shadow-orange-200">
                        ➕ Tambah Pengumuman
                    </a>
                </div>
            @endforelse
        </div>

        <div>
            {{ $announcements->links() }}
        </div>

    </div>
</x-admin-layout>