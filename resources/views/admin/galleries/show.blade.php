<x-admin-layout>
    <div class="space-y-6">

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('admin.galleries.index') }}"
               class="inline-flex w-fit items-center gap-2 rounded-2xl bg-white px-4 py-3 font-bold text-slate-600 shadow-sm">
                ← Kembali
            </a>

            <div class="flex gap-2">
                <a href="{{ route('admin.galleries.edit', $gallery) }}"
                   class="inline-flex items-center gap-2 rounded-2xl bg-yellow-400 px-5 py-3 font-black text-yellow-950">
                    ✏️ Edit
                </a>

                <form action="{{ route('admin.galleries.destroy', $gallery) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
                    @csrf
                    @method('DELETE')

                    <button class="inline-flex items-center gap-2 rounded-2xl bg-red-500 px-5 py-3 font-black text-white">
                        🗑️ Hapus
                    </button>
                </form>
            </div>
        </div>

        <article class="overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-200/70">

            <div class="relative bg-slate-900">
                <img src="{{ asset('storage/' . $gallery->image) }}"
                     alt="{{ $gallery->title }}"
                     class="max-h-[650px] w-full object-cover">

                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>

                <div class="absolute bottom-6 left-6 right-6 text-white">
                    <span class="rounded-full px-3 py-1 text-xs font-black
                        {{ $gallery->status === 'published' ? 'bg-emerald-500' : 'bg-yellow-400 text-yellow-950' }}">
                        {{ ucfirst($gallery->status) }}
                    </span>

                    @if($gallery->category)
                        <span class="ml-2 rounded-full bg-white/20 px-3 py-1 text-xs font-black">
                            🏷️ {{ $gallery->category }}
                        </span>
                    @endif

                    <h1 class="mt-5 max-w-4xl text-3xl sm:text-5xl font-black">
                        {{ $gallery->title }}
                    </h1>

                    <p class="mt-3 text-sm text-white/80">
                        🗓️ {{ $gallery->created_at->format('d M Y H:i') }}
                    </p>
                </div>
            </div>

            <div class="p-6 sm:p-8">
                <div class="rounded-3xl bg-pink-50 p-6 text-pink-800 leading-relaxed font-medium">
                    {!! nl2br(e($gallery->description ?: 'Tidak ada deskripsi galeri.')) !!}
                </div>
            </div>

        </article>

    </div>
</x-admin-layout>