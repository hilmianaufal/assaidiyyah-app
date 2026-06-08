<x-admin-layout>
    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('admin.authors.index') }}"
               class="inline-flex w-fit items-center gap-2 rounded-2xl bg-white px-4 py-3 font-bold text-slate-600 shadow-sm">
                ← Kembali
            </a>

            <div class="flex gap-2">
                <a href="{{ route('admin.authors.edit', $author) }}"
                   class="inline-flex items-center gap-2 rounded-2xl bg-yellow-400 px-5 py-3 font-black text-yellow-950">
                    ✏️ Edit
                </a>

                <form action="{{ route('admin.authors.destroy', $author) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus penulis ini?')">
                    @csrf
                    @method('DELETE')

                    <button class="inline-flex items-center gap-2 rounded-2xl bg-red-500 px-5 py-3 font-black text-white">
                        🗑️ Hapus
                    </button>
                </form>
            </div>
        </div>

        <article class="overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-200/70">
            <div class="relative bg-gradient-to-br from-cyan-500 via-blue-600 to-indigo-700 p-8 sm:p-10 text-white">
                <div class="absolute right-8 bottom-4 text-8xl opacity-20">✍️</div>

                <div class="relative z-10 flex flex-col gap-6 sm:flex-row sm:items-center">
                    @if($author->photo)
                        <img src="{{ asset('storage/' . $author->photo) }}"
                             class="h-32 w-32 rounded-[2rem] object-cover ring-4 ring-white/30">
                    @else
                        <div class="flex h-32 w-32 items-center justify-center rounded-[2rem] bg-white/20 text-6xl ring-4 ring-white/30">
                            ✍️
                        </div>
                    @endif

                    <div>
                        <span class="rounded-full bg-white/20 px-3 py-1 text-xs font-black">
                            {{ $author->role ?: 'Penulis Berita' }}
                        </span>

                        <h1 class="mt-4 text-3xl sm:text-5xl font-black">
                            {{ $author->name }}
                        </h1>

                        <p class="mt-2 text-white/85 font-bold">
                            {{ $author->class_name ?: 'Kelas belum diisi' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="grid gap-5 p-6 sm:p-8 md:grid-cols-2">
                <div class="rounded-3xl bg-blue-50 p-5">
                    <div class="text-2xl">🏷️</div>
                    <p class="mt-3 text-sm font-bold text-blue-600">Peran</p>
                    <p class="mt-1 font-black text-slate-900">{{ $author->role ?: '-' }}</p>
                </div>

                <div class="rounded-3xl bg-cyan-50 p-5">
                    <div class="text-2xl">🏫</div>
                    <p class="mt-3 text-sm font-bold text-cyan-600">Kelas</p>
                    <p class="mt-1 font-black text-slate-900">{{ $author->class_name ?: '-' }}</p>
                </div>

                <div class="rounded-3xl bg-indigo-50 p-5 md:col-span-2">
                    <div class="text-2xl">📰</div>
                    <p class="mt-3 text-sm font-bold text-indigo-600">Total Berita</p>
                    <p class="mt-1 font-black text-slate-900">{{ $author->news()->count() }}</p>
                </div>

                <div class="rounded-3xl bg-slate-50 p-5 md:col-span-2">
                    <div class="text-2xl">📖</div>
                    <p class="mt-3 text-sm font-bold text-slate-500">Biografi</p>
                    <p class="mt-2 leading-relaxed font-medium text-slate-700">
                        {!! nl2br(e($author->bio ?: 'Belum ada biografi penulis.')) !!}
                    </p>
                </div>
            </div>
        </article>
    </div>
</x-admin-layout>