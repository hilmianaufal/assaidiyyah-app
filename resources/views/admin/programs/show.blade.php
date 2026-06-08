<x-admin-layout>
    <div class="space-y-6">

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('admin.programs.index') }}"
               class="inline-flex w-fit items-center gap-2 rounded-2xl bg-white px-4 py-3 font-bold text-slate-600 shadow-sm">
                ← Kembali
            </a>

            <div class="flex gap-2">
                <a href="{{ route('admin.programs.edit', $program) }}"
                   class="inline-flex items-center gap-2 rounded-2xl bg-yellow-400 px-5 py-3 font-black text-yellow-950">
                    ✏️ Edit
                </a>

                <form action="{{ route('admin.programs.destroy', $program) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus program ini?')">
                    @csrf
                    @method('DELETE')

                    <button class="inline-flex items-center gap-2 rounded-2xl bg-red-500 px-5 py-3 font-black text-white">
                        🗑️ Hapus
                    </button>
                </form>
            </div>
        </div>

        <article class="overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-200/70">

            <div class="relative bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-500 p-8 sm:p-10 text-white">
                <div class="absolute right-8 bottom-4 text-8xl opacity-20">
                    {{ $program->icon ?: '📚' }}
                </div>

                <span class="rounded-full px-3 py-1 text-xs font-black
                    {{ $program->status === 'published' ? 'bg-emerald-700 text-white' : 'bg-yellow-400 text-yellow-950' }}">
                    {{ ucfirst($program->status) }}
                </span>

                <span class="ml-2 rounded-full bg-white/20 px-3 py-1 text-xs font-black">
                    Urutan: {{ $program->sort_order }}
                </span>

                <div class="relative z-10 mt-6 text-6xl">
                    {{ $program->icon ?: '📚' }}
                </div>

                <h1 class="relative z-10 mt-5 max-w-4xl text-3xl sm:text-5xl font-black">
                    {{ $program->title }}
                </h1>
            </div>

            @if($program->image)
                <img src="{{ asset('storage/' . $program->image) }}"
                     alt="{{ $program->title }}"
                     class="max-h-[500px] w-full object-cover">
            @endif

            <div class="p-6 sm:p-8">
                <div class="rounded-3xl bg-emerald-50 p-6 text-emerald-800 leading-relaxed font-medium">
                    {!! nl2br(e($program->description ?: 'Tidak ada deskripsi program.')) !!}
                </div>
            </div>

        </article>

    </div>
</x-admin-layout>