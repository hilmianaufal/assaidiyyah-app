<x-admin-layout>
    <div class="space-y-6">
        <a href="{{ route('admin.news-tags.index') }}"
           class="inline-flex w-fit items-center gap-2 rounded-2xl bg-white px-4 py-3 font-bold text-slate-600 shadow-sm">
            ← Kembali
        </a>

        <article class="overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-200/70">
            <div class="relative bg-gradient-to-br from-slate-900 via-indigo-700 to-blue-600 p-8 sm:p-10 text-white">
                <div class="absolute right-8 bottom-4 text-8xl opacity-20">#️⃣</div>

                <h1 class="relative z-10 text-3xl sm:text-5xl font-black">
                    {{ $tag->name }}
                </h1>

                <p class="relative z-10 mt-3 text-white/85 font-bold">
                    {{ $tag->slug }}
                </p>
            </div>

            <div class="grid gap-5 p-6 sm:p-8 md:grid-cols-2">
                <div class="rounded-3xl bg-indigo-50 p-5">
                    <div class="text-2xl">📰</div>
                    <p class="mt-3 text-sm font-bold text-indigo-600">Jumlah Berita</p>
                    <p class="mt-1 font-black text-slate-900">
                        {{ $tag->news()->count() }}
                    </p>
                </div>

                <div class="rounded-3xl bg-blue-50 p-5">
                    <div class="text-2xl">🔗</div>
                    <p class="mt-3 text-sm font-bold text-blue-600">Slug</p>
                    <p class="mt-1 font-black text-slate-900">
                        {{ $tag->slug }}
                    </p>
                </div>
            </div>
        </article>
    </div>
</x-admin-layout>