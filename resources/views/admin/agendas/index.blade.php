<x-admin-layout>
    <div class="space-y-6">

        <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 p-6 sm:p-8 text-white shadow-2xl shadow-purple-200">
            <div class="absolute right-8 bottom-4 text-7xl opacity-20">📅</div>

            <div class="relative z-10 flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <div class="inline-flex items-center gap-2 rounded-full bg-white/20 px-4 py-2 text-sm font-bold">
                        ✨ Jadwal Kegiatan
                    </div>

                    <h1 class="mt-5 text-3xl sm:text-4xl font-black">
                        Agenda
                    </h1>

                    <p class="mt-2 max-w-xl text-white/90">
                        Kelola jadwal kegiatan Pondok Pesantren Assaidiyyah.
                    </p>
                </div>

                <a href="{{ route('admin.agendas.create') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-2xl bg-white px-5 py-3.5 font-black text-purple-700 shadow-xl">
                    ➕ Tambah Agenda
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="rounded-3xl border border-emerald-100 bg-emerald-50 p-4 text-sm font-bold text-emerald-700">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-4">
            @forelse($agendas as $item)
                <div class="rounded-[2rem] bg-white p-5 shadow-xl shadow-slate-200/70 border border-white">
                    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

                        <div class="flex gap-4">
                            <div class="flex h-20 w-20 shrink-0 flex-col items-center justify-center rounded-3xl bg-purple-50 text-purple-700">
                                <span class="text-xs font-black uppercase">
                                    {{ $item->event_date->format('M') }}
                                </span>
                                <span class="text-3xl font-black">
                                    {{ $item->event_date->format('d') }}
                                </span>
                            </div>

                            <div>
                                <h2 class="text-lg sm:text-xl font-black">
                                    {{ $item->title }}
                                </h2>

                                <div class="mt-2 flex flex-wrap gap-2 text-xs font-bold text-slate-500">
                                    <span class="rounded-full bg-purple-50 px-3 py-1.5 text-purple-600">
                                        📅 {{ $item->event_date->format('d M Y') }}
                                    </span>

                                    <span class="rounded-full bg-blue-50 px-3 py-1.5 text-blue-600">
                                        ⏰ {{ $item->event_time ?: 'Waktu belum diisi' }}
                                    </span>

                                    <span class="rounded-full bg-slate-100 px-3 py-1.5">
                                        📍 {{ $item->location ?: 'Lokasi belum diisi' }}
                                    </span>
                                </div>

                                <p class="mt-3 line-clamp-2 text-sm leading-relaxed text-slate-500">
                                    {{ $item->description ?: 'Tidak ada deskripsi agenda.' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <span class="rounded-full px-3 py-1 text-xs font-black
                                {{ $item->status === 'published' ? 'bg-emerald-50 text-emerald-600' : 'bg-yellow-50 text-yellow-600' }}">
                                {{ ucfirst($item->status) }}
                            </span>

                            <a href="{{ route('admin.agendas.show', $item) }}"
                               class="flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-50 text-lg">
                                👁️
                            </a>

                            <a href="{{ route('admin.agendas.edit', $item) }}"
                               class="flex h-11 w-11 items-center justify-center rounded-2xl bg-yellow-50 text-lg">
                                ✏️
                            </a>

                            <form action="{{ route('admin.agendas.destroy', $item) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus agenda ini?')">
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
                    <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-[2rem] bg-purple-50 text-5xl">
                        📅
                    </div>

                    <h3 class="mt-5 text-2xl font-black">
                        Belum ada agenda
                    </h3>

                    <p class="mt-2 text-slate-500">
                        Tambahkan agenda kegiatan pertama untuk website pondok.
                    </p>

                    <a href="{{ route('admin.agendas.create') }}"
                       class="mt-6 inline-flex items-center gap-2 rounded-2xl bg-purple-600 px-5 py-3 font-black text-white shadow-lg shadow-purple-200">
                        ➕ Tambah Agenda
                    </a>
                </div>
            @endforelse
        </div>

        <div>
            {{ $agendas->links() }}
        </div>

    </div>
</x-admin-layout>