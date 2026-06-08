<x-admin-layout>

    <div class="space-y-6">

        <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-yellow-400 via-blue-600 to-cyan-500 p-6 sm:p-8 text-white shadow-2xl shadow-blue-200">

            <div class="absolute right-8 bottom-4 text-8xl opacity-20">
                ✏️
            </div>

            <a href="{{ route('admin.news.index') }}"
               class="inline-flex items-center gap-2 rounded-full bg-white/20 px-4 py-2 text-sm font-bold backdrop-blur">
                ← Kembali
            </a>

            <h1 class="mt-5 text-3xl sm:text-5xl font-black">
                Edit Berita
            </h1>

            <p class="mt-3 max-w-xl text-blue-50">
                Perbarui informasi berita dan konten artikel.
            </p>

        </div>

        <form action="{{ route('admin.news.update', $news) }}"
              method="POST"
              enctype="multipart/form-data"
              class="rounded-[2rem] bg-white p-5 sm:p-8 shadow-xl shadow-slate-200/70">

            @csrf
            @method('PUT')

            @include('admin.news.form', [
                'news' => $news,
                'categories' => $categories,
                'authors' => $authors,
                'tags' => $tags
            ])

            <div class="mt-8 flex flex-col sm:flex-row gap-3">

                <button type="submit"
                        class="inline-flex flex-1 items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 px-5 py-4 font-black text-white shadow-xl shadow-blue-200">
                    💾 Update Berita
                </button>

                <a href="{{ route('admin.news.show', $news) }}"
                   class="inline-flex items-center justify-center rounded-2xl bg-blue-50 px-5 py-4 font-black text-blue-600">
                    👁️ Lihat
                </a>

                <a href="{{ route('admin.news.index') }}"
                   class="inline-flex items-center justify-center rounded-2xl bg-slate-100 px-5 py-4 font-black text-slate-600">
                    Batal
                </a>

            </div>

        </form>

    </div>

</x-admin-layout>