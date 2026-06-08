<x-admin-layout>
    <div class="space-y-6">

        <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-yellow-400 via-orange-500 to-red-500 p-6 sm:p-8 text-white shadow-2xl shadow-orange-200">
            <div class="absolute right-8 bottom-4 text-7xl opacity-20">🏆</div>

            <div class="relative z-10 flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <div class="inline-flex items-center gap-2 rounded-full bg-white/20 px-4 py-2 text-sm font-bold">
                        ✨ Prestasi Santri
                    </div>

                    <h1 class="mt-5 text-3xl sm:text-4xl font-black">
                        Prestasi
                    </h1>

                    <p class="mt-2 max-w-xl text-white/90">
                        Kelola prestasi santri dalam bidang tahfidz, akademik, lomba, seni, olahraga, dan lainnya.
                    </p>
                </div>

                <a href="{{ route('admin.achievements.create') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-2xl bg-white px-5 py-3.5 font-black text-orange-600 shadow-xl">
                    ➕ Tambah Prestasi
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="rounded-3xl border border-emerald-100 bg-emerald-50 p-4 text-sm font-bold text-emerald-700">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-3">
            @forelse($achievements as $achievement)
                <div class="group overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-200/70 border border-white transition hover:-translate-y-1 hover:shadow-2xl">

                    <div class="relative h-56 overflow-hidden bg-gradient-to-br from-yellow-100 to-orange-100">
                        @if($achievement->image)
                            <img src="{{ asset('storage/' . $achievement->image) }}"
                                 alt="{{ $achievement->title }}"
                                 class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        @else
                            <div class="flex h-full w-full items-center justify-center text-7xl">
                                🏆
                            </div>
                        @endif

                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/75 via-transparent to-transparent"></div>

                        <span class="absolute left-4 top-4 rounded-full px-3 py-1 text-xs font-black
                            {{ $achievement->status === 'published' ? 'bg-emerald-500 text-white' : 'bg-yellow-300 text-yellow-950' }}">
                            {{ ucfirst($achievement->status) }}
                        </span>

                        @if($achievement->level)
                            <span class="absolute right-4 top-4 rounded-full bg-white/90 px-3 py-1 text-xs font-black text-orange-600">
                                🌟 {{ $achievement->level }}
                            </span>
                        @endif

                        <div class="absolute bottom-4 left-4 right-4 text-white">
                            <h2 class="text-xl font-black">
                                {{ $achievement->title }}
                            </h2>

                            <p class="mt-1 text-sm font-bold text-white/80">
                                👨‍🎓 {{ $achievement->student_name ?: 'Santri Assaidiyyah' }}
                            </p>
                        </div>
                    </div>

                    <div class="p-5">
                        <div class="grid grid-cols-2 gap-3 text-sm">
                            <div class="rounded-2xl bg-yellow-50 p-3">
                                <p class="text-xs font-bold text-yellow-600">Kategori</p>
                                <p class="mt-1 font-black truncate">{{ $achievement->category ?: '-' }}</p>
                            </div>

                            <div class="rounded-2xl bg-orange-50 p-3">
                                <p class="text-xs font-bold text-orange-600">Tanggal</p>
                                <p class="mt-1 font-black">
                                    {{ $achievement->achievement_date ? $achievement->achievement_date->format('d M Y') : '-' }}
                                </p>
                            </div>
                        </div>

                        <p class="mt-4 line-clamp-2 text-sm leading-relaxed text-slate-500">
                            {{ $achievement->description ?: 'Belum ada deskripsi prestasi.' }}
                        </p>

                        <div class="mt-5 flex items-center justify-between gap-2">
                            <span class="text-xs font-bold text-slate-500">
                                🗓️ {{ $achievement->created_at->format('d M Y') }}
                            </span>

                            <div class="flex gap-2">
                                <a href="{{ route('admin.achievements.show', $achievement) }}"
                                   class="flex h-10 w-10 items-center justify-center rounded-2xl bg-blue-50 text-lg">
                                    👁️
                                </a>

                                <a href="{{ route('admin.achievements.edit', $achievement) }}"
                                   class="flex h-10 w-10 items-center justify-center rounded-2xl bg-yellow-50 text-lg">
                                    ✏️
                                </a>

                                <form action="{{ route('admin.achievements.destroy', $achievement) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus prestasi ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="flex h-10 w-10 items-center justify-center rounded-2xl bg-red-50 text-lg">
                                        🗑️
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            @empty
                <div class="sm:col-span-2 xl:col-span-3 rounded-[2rem] bg-white p-10 text-center shadow-xl shadow-slate-200/70">
                    <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-[2rem] bg-yellow-50 text-5xl">
                        🏆
                    </div>

                    <h3 class="mt-5 text-2xl font-black">
                        Belum ada prestasi
                    </h3>

                    <p class="mt-2 text-slate-500">
                        Tambahkan prestasi pertama santri Pondok Pesantren Assaidiyyah.
                    </p>

                    <a href="{{ route('admin.achievements.create') }}"
                       class="mt-6 inline-flex items-center gap-2 rounded-2xl bg-orange-500 px-5 py-3 font-black text-white shadow-lg shadow-orange-200">
                        ➕ Tambah Prestasi
                    </a>
                </div>
            @endforelse
        </div>

        <div>
            {{ $achievements->links() }}
        </div>

    </div>
</x-admin-layout>