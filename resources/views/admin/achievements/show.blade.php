<x-admin-layout>
    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('admin.achievements.index') }}"
               class="inline-flex w-fit items-center gap-2 rounded-2xl bg-white px-4 py-3 font-bold text-slate-600 shadow-sm">
                ← Kembali
            </a>

            <div class="flex gap-2">
                <a href="{{ route('admin.achievements.edit', $achievement) }}"
                   class="inline-flex items-center gap-2 rounded-2xl bg-yellow-400 px-5 py-3 font-black text-yellow-950">
                    ✏️ Edit
                </a>

                <form action="{{ route('admin.achievements.destroy', $achievement) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus prestasi ini?')">
                    @csrf
                    @method('DELETE')

                    <button class="inline-flex items-center gap-2 rounded-2xl bg-red-500 px-5 py-3 font-black text-white">
                        🗑️ Hapus
                    </button>
                </form>
            </div>
        </div>

        <article class="overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-200/70">
            <div class="relative bg-gradient-to-br from-yellow-400 via-orange-500 to-red-500 p-8 sm:p-10 text-white">
                <div class="absolute right-8 bottom-4 text-8xl opacity-20">🏆</div>

                <span class="rounded-full px-3 py-1 text-xs font-black
                    {{ $achievement->status === 'published' ? 'bg-emerald-500 text-white' : 'bg-yellow-200 text-yellow-950' }}">
                    {{ ucfirst($achievement->status) }}
                </span>

                @if($achievement->level)
                    <span class="ml-2 rounded-full bg-white/20 px-3 py-1 text-xs font-black">
                        🌟 {{ $achievement->level }}
                    </span>
                @endif

                <h1 class="relative z-10 mt-5 max-w-4xl text-3xl sm:text-5xl font-black">
                    {{ $achievement->title }}
                </h1>

                <p class="relative z-10 mt-3 text-white/85 font-bold">
                    👨‍🎓 {{ $achievement->student_name ?: 'Santri Assaidiyyah' }}
                </p>
            </div>

            @if($achievement->image)
                <img src="{{ asset('storage/' . $achievement->image) }}"
                     alt="{{ $achievement->title }}"
                     class="max-h-[520px] w-full object-cover">
            @endif

            <div class="grid gap-5 p-6 sm:p-8 md:grid-cols-3">
                <div class="rounded-3xl bg-yellow-50 p-5">
                    <div class="text-2xl">🏷️</div>
                    <p class="mt-3 text-sm font-bold text-yellow-600">Kategori</p>
                    <p class="mt-1 font-black text-slate-900">{{ $achievement->category ?: '-' }}</p>
                </div>

                <div class="rounded-3xl bg-orange-50 p-5">
                    <div class="text-2xl">🌟</div>
                    <p class="mt-3 text-sm font-bold text-orange-600">Tingkat</p>
                    <p class="mt-1 font-black text-slate-900">{{ $achievement->level ?: '-' }}</p>
                </div>

                <div class="rounded-3xl bg-red-50 p-5">
                    <div class="text-2xl">📅</div>
                    <p class="mt-3 text-sm font-bold text-red-600">Tanggal</p>
                    <p class="mt-1 font-black text-slate-900">
                        {{ $achievement->achievement_date ? $achievement->achievement_date->format('d M Y') : '-' }}
                    </p>
                </div>

                <div class="rounded-3xl bg-slate-50 p-5 md:col-span-3">
                    <div class="text-2xl">📖</div>
                    <p class="mt-3 text-sm font-bold text-slate-500">Deskripsi</p>
                    <p class="mt-2 leading-relaxed font-medium text-slate-700">
                        {!! nl2br(e($achievement->description ?: 'Belum ada deskripsi prestasi.')) !!}
                    </p>
                </div>
            </div>
        </article>
    </div>
</x-admin-layout>