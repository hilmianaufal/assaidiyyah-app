<x-admin-layout>
    <div class="space-y-6">

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('admin.announcements.index') }}"
               class="inline-flex w-fit items-center gap-2 rounded-2xl bg-white px-4 py-3 font-bold text-slate-600 shadow-sm">
                ← Kembali
            </a>

            <div class="flex gap-2">
                <a href="{{ route('admin.announcements.edit', $announcement) }}"
                   class="inline-flex items-center gap-2 rounded-2xl bg-yellow-400 px-5 py-3 font-black text-yellow-950">
                    ✏️ Edit
                </a>

                <form action="{{ route('admin.announcements.destroy', $announcement) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')">
                    @csrf
                    @method('DELETE')

                    <button class="inline-flex items-center gap-2 rounded-2xl bg-red-500 px-5 py-3 font-black text-white">
                        🗑️ Hapus
                    </button>
                </form>
            </div>
        </div>

        <article class="overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-200/70">

            <div class="relative bg-gradient-to-br from-orange-500 via-red-500 to-pink-500 p-8 sm:p-10 text-white">
                <div class="absolute right-8 bottom-4 text-8xl opacity-20">📢</div>

                <span class="rounded-full px-3 py-1 text-xs font-black
                    {{ $announcement->status === 'published' ? 'bg-emerald-500' : 'bg-yellow-400 text-yellow-950' }}">
                    {{ ucfirst($announcement->status) }}
                </span>

                <h1 class="relative z-10 mt-5 max-w-4xl text-3xl sm:text-5xl font-black">
                    {{ $announcement->title }}
                </h1>

                <p class="relative z-10 mt-4 text-white/85">
                    🗓️ {{ $announcement->published_at ? $announcement->published_at->format('d M Y') : 'Belum dijadwalkan' }}
                </p>
            </div>

            <div class="p-6 sm:p-8">
                <div class="rounded-3xl bg-orange-50 p-6 text-orange-800 leading-relaxed font-medium">
                    {!! nl2br(e($announcement->content)) !!}
                </div>
            </div>

        </article>

    </div>
</x-admin-layout>