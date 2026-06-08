<x-admin-layout>
    <div class="space-y-6">

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('admin.agendas.index') }}"
               class="inline-flex w-fit items-center gap-2 rounded-2xl bg-white px-4 py-3 font-bold text-slate-600 shadow-sm">
                ← Kembali
            </a>

            <div class="flex gap-2">
                <a href="{{ route('admin.agendas.edit', $agenda) }}"
                   class="inline-flex items-center gap-2 rounded-2xl bg-yellow-400 px-5 py-3 font-black text-yellow-950">
                    ✏️ Edit
                </a>

                <form action="{{ route('admin.agendas.destroy', $agenda) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus agenda ini?')">
                    @csrf
                    @method('DELETE')

                    <button class="inline-flex items-center gap-2 rounded-2xl bg-red-500 px-5 py-3 font-black text-white">
                        🗑️ Hapus
                    </button>
                </form>
            </div>
        </div>

        <article class="overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-200/70">

            <div class="relative bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 p-8 sm:p-10 text-white">
                <div class="absolute right-8 bottom-4 text-8xl opacity-20">📅</div>

                <span class="rounded-full px-3 py-1 text-xs font-black
                    {{ $agenda->status === 'published' ? 'bg-emerald-500' : 'bg-yellow-400 text-yellow-950' }}">
                    {{ ucfirst($agenda->status) }}
                </span>

                <h1 class="relative z-10 mt-5 max-w-4xl text-3xl sm:text-5xl font-black">
                    {{ $agenda->title }}
                </h1>

                <div class="relative z-10 mt-6 flex flex-wrap gap-3 text-sm font-bold">
                    <span class="rounded-full bg-white/20 px-4 py-2">
                        📅 {{ $agenda->event_date->format('d M Y') }}
                    </span>

                    <span class="rounded-full bg-white/20 px-4 py-2">
                        ⏰ {{ $agenda->event_time ?: 'Waktu belum diisi' }}
                    </span>

                    <span class="rounded-full bg-white/20 px-4 py-2">
                        📍 {{ $agenda->location ?: 'Lokasi belum diisi' }}
                    </span>
                </div>
            </div>

            <div class="p-6 sm:p-8">
                <div class="rounded-3xl bg-purple-50 p-6 text-purple-800 leading-relaxed font-medium">
                    {!! nl2br(e($agenda->description ?: 'Tidak ada deskripsi agenda.')) !!}
                </div>
            </div>

        </article>

    </div>
</x-admin-layout>