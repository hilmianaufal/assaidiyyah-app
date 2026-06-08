<x-admin-layout>
    <div class="space-y-6">

        <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-yellow-500 via-orange-500 to-red-500 p-6 sm:p-8 text-white shadow-2xl shadow-orange-200">
            <div class="absolute right-8 bottom-4 text-7xl opacity-20">👳</div>

            <div class="relative z-10 flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <div class="inline-flex items-center gap-2 rounded-full bg-white/20 px-4 py-2 text-sm font-bold">
                        ✨ Dewan Asatidz
                    </div>

                    <h1 class="mt-5 text-3xl sm:text-4xl font-black">
                        Data Ustadz
                    </h1>

                    <p class="mt-2 max-w-xl text-white/90">
                        Kelola data ustadz, jabatan, pendidikan, biografi, dan foto pengajar.
                    </p>
                </div>

                <a href="{{ route('admin.teachers.create') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-2xl bg-white px-5 py-3.5 font-black text-orange-600 shadow-xl">
                    ➕ Tambah Ustadz
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="rounded-3xl border border-emerald-100 bg-emerald-50 p-4 text-sm font-bold text-emerald-700">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-3">
            @forelse($teachers as $teacher)
                <div class="overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-200/70 border border-white transition hover:-translate-y-1 hover:shadow-2xl">

                    <div class="relative bg-gradient-to-br from-yellow-500 to-orange-500 p-5 text-white">
                        <span class="absolute right-5 top-5 rounded-full px-3 py-1 text-xs font-black
                            {{ $teacher->status === 'active' ? 'bg-emerald-900/40' : 'bg-red-900/40' }}">
                            {{ $teacher->status === 'active' ? 'Aktif' : 'Nonaktif' }}
                        </span>

                        <div class="flex items-center gap-4">
                            @if($teacher->photo)
                                <img src="{{ asset('storage/' . $teacher->photo) }}"
                                     class="h-20 w-20 rounded-3xl object-cover ring-4 ring-white/30">
                            @else
                                <div class="flex h-20 w-20 items-center justify-center rounded-3xl bg-white/20 text-4xl ring-4 ring-white/30">
                                    👳
                                </div>
                            @endif

                            <div class="pr-20">
                                <h2 class="text-xl font-black leading-tight">
                                    {{ $teacher->name }}
                                </h2>
                                <p class="mt-1 text-sm font-bold text-white/80">
                                    {{ $teacher->position ?: 'Ustadz / Pengajar' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="p-5">
                        <div class="grid grid-cols-2 gap-3 text-sm">
                            <div class="rounded-2xl bg-orange-50 p-3">
                                <p class="text-xs font-bold text-orange-600">Pendidikan</p>
                                <p class="mt-1 font-black truncate">{{ $teacher->education ?: '-' }}</p>
                            </div>

                            <div class="rounded-2xl bg-yellow-50 p-3">
                                <p class="text-xs font-bold text-yellow-600">Urutan</p>
                                <p class="mt-1 font-black">{{ $teacher->sort_order }}</p>
                            </div>

                            <div class="col-span-2 rounded-2xl bg-blue-50 p-3">
                                <p class="text-xs font-bold text-blue-600">Telepon</p>
                                <p class="mt-1 font-black">{{ $teacher->phone ?: '-' }}</p>
                            </div>
                        </div>

                        <p class="mt-4 line-clamp-2 text-sm leading-relaxed text-slate-500">
                            {{ $teacher->bio ?: 'Belum ada biografi.' }}
                        </p>

                        <div class="mt-5 flex items-center justify-between gap-2">
                            <span class="text-xs font-bold text-slate-500">
                                🗓️ {{ $teacher->created_at->format('d M Y') }}
                            </span>

                            <div class="flex gap-2">
                                <a href="{{ route('admin.teachers.show', $teacher) }}"
                                   class="flex h-10 w-10 items-center justify-center rounded-2xl bg-blue-50 text-lg">
                                    👁️
                                </a>

                                <a href="{{ route('admin.teachers.edit', $teacher) }}"
                                   class="flex h-10 w-10 items-center justify-center rounded-2xl bg-yellow-50 text-lg">
                                    ✏️
                                </a>

                                <form action="{{ route('admin.teachers.destroy', $teacher) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus data ustadz ini?')">
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
                    <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-[2rem] bg-orange-50 text-5xl">
                        👳
                    </div>

                    <h3 class="mt-5 text-2xl font-black">
                        Belum ada data ustadz
                    </h3>

                    <p class="mt-2 text-slate-500">
                        Tambahkan data ustadz pertama untuk website pondok.
                    </p>

                    <a href="{{ route('admin.teachers.create') }}"
                       class="mt-6 inline-flex items-center gap-2 rounded-2xl bg-orange-500 px-5 py-3 font-black text-white shadow-lg shadow-orange-200">
                        ➕ Tambah Ustadz
                    </a>
                </div>
            @endforelse
        </div>

        <div>
            {{ $teachers->links() }}
        </div>

    </div>
</x-admin-layout>