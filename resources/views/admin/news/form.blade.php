<div class="grid gap-6 lg:grid-cols-3">

    <div class="lg:col-span-2 space-y-6">

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                📝 Judul Berita
            </label>

            <input type="text"
                   name="title"
                   value="{{ old('title', $news?->title) }}"
                   placeholder="Contoh: Wisuda Tahfidz Angkatan XV"
                   class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-blue-500 focus:ring-blue-500"
                   required>

            @error('title')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                💡 Ringkasan Berita
            </label>

            <textarea name="excerpt"
                      rows="4"
                      maxlength="500"
                      placeholder="Tulis ringkasan singkat berita..."
                      class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-medium focus:border-blue-500 focus:ring-blue-500">{{ old('excerpt', $news?->excerpt) }}</textarea>

            @error('excerpt')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                📖 Isi Berita
            </label>

            <textarea name="content" class="tinymce">{{ old('content', $news->content ?? '') }}</textarea>

            @error('content')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

    </div>

    <div class="space-y-6">

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                🏷️ Kategori
            </label>

            <select name="news_category_id"
                    class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-blue-500 focus:ring-blue-500">
                <option value="">Pilih Kategori</option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        @selected(old('news_category_id', $news?->news_category_id) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('news_category_id')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                ✍️ Penulis
            </label>

            <select name="author_id"
                    class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-blue-500 focus:ring-blue-500">
                <option value="">Pilih Penulis</option>

                @foreach($authors as $author)
                    <option value="{{ $author->id }}"
                        @selected(old('author_id', $news?->author_id) == $author->id)>
                        {{ $author->name }} {{ $author->class_name ? '- ' . $author->class_name : '' }}
                    </option>
                @endforeach
            </select>

            @error('author_id')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                #️⃣ Tag Berita
            </label>

            @if($tags->count())
                <div class="max-h-56 space-y-2 overflow-y-auto pr-1">
                    @foreach($tags as $tag)
                        <label class="flex cursor-pointer items-center gap-3 rounded-2xl bg-white px-4 py-3 transition hover:bg-indigo-50">
                            <input type="checkbox"
                                   name="tags[]"
                                   value="{{ $tag->id }}"
                                   class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500"
                                   @checked(in_array($tag->id, old('tags', $news?->tags?->pluck('id')->toArray() ?? [])))>

                            <span class="font-bold text-slate-700">
                                # {{ $tag->name }}
                            </span>
                        </label>
                    @endforeach
                </div>
            @else
                <p class="rounded-2xl bg-yellow-50 p-3 text-sm font-bold text-yellow-700">
                    Belum ada tag. Buat tag dulu di menu Tag Berita.
                </p>
            @endif

            @error('tags')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                🖼️ Thumbnail
            </label>

            @if($news?->thumbnail)
                <img src="{{ asset('storage/' . $news->thumbnail) }}"
                     class="mb-4 h-44 w-full rounded-2xl object-cover shadow">
            @else
                <div class="mb-4 flex h-44 w-full items-center justify-center rounded-2xl bg-gradient-to-br from-blue-100 to-cyan-100 text-5xl">
                    📰
                </div>
            @endif

            <input type="file"
                   name="thumbnail"
                   class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm">

            <p class="mt-2 text-xs text-slate-500">
                Format JPG, PNG, WEBP. Maksimal 2MB.
            </p>

            @error('thumbnail')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                🗓️ Tanggal Publish
            </label>

            <input type="datetime-local"
                   name="published_at"
                   value="{{ old('published_at', $news?->published_at?->format('Y-m-d\TH:i')) }}"
                   class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-blue-500 focus:ring-blue-500">

            @error('published_at')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                🚦 Status
            </label>

            <select name="status"
                    class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-blue-500 focus:ring-blue-500">
                <option value="draft" @selected(old('status', $news?->status) === 'draft')>
                    Draft
                </option>

                <option value="published" @selected(old('status', $news?->status) === 'published')>
                    Published
                </option>
            </select>

            @error('status')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
    <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
        🔎 SEO Title
    </label>

    <input type="text"
           name="meta_title"
           value="{{ old('meta_title', $news?->meta_title) }}"
           maxlength="255"
           placeholder="Judul SEO untuk Google"
           class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-blue-500 focus:ring-blue-500">
    </div>

    <div class="rounded-3xl bg-slate-50 p-5">
        <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
            📝 SEO Description
        </label>

        <textarea name="meta_description"
                rows="4"
                maxlength="500"
                placeholder="Deskripsi singkat untuk Google"
                class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-medium focus:border-blue-500 focus:ring-blue-500">{{ old('meta_description', $news?->meta_description) }}</textarea>
    </div>

    <div class="rounded-3xl bg-slate-50 p-5">
        <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
            🏷️ SEO Keywords
        </label>

        <input type="text"
            name="meta_keywords"
            value="{{ old('meta_keywords', $news?->meta_keywords) }}"
            placeholder="pesantren, tahfidz, ppdb"
            class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-blue-500 focus:ring-blue-500">
    </div>

    <div class="rounded-3xl bg-slate-50 p-5">
        <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
            🌐 OG Image
        </label>

        @if($news?->og_image)
            <img src="{{ asset('storage/' . $news->og_image) }}"
                class="mb-4 h-40 w-full rounded-2xl object-cover shadow">
        @endif

        <input type="file"
            name="og_image"
            class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm">

        <p class="mt-2 text-xs text-slate-500">
            Gambar ini dipakai saat berita dibagikan ke WhatsApp/Facebook.
        </p>
    </div>

        <label class="flex cursor-pointer items-center gap-3 rounded-3xl bg-blue-50 p-5 text-blue-700 transition hover:bg-blue-100">
            <input type="checkbox"
                   name="is_featured"
                   value="1"
                   class="rounded border-blue-300 text-blue-600 focus:ring-blue-500"
                   @checked(old('is_featured', $news?->is_featured))>

            <span class="font-black">
                ⭐ Jadikan Berita Utama
            </span>
        </label>

        @if($news)
            <div class="rounded-3xl bg-indigo-50 p-5 text-indigo-700">
                <div class="text-3xl">📊</div>

                <h3 class="mt-3 font-black">
                    Statistik
                </h3>

                <div class="mt-3 space-y-2 text-sm font-bold">
                    <p>👁️ Views: {{ number_format($news->views ?? 0) }}</p>
                    <p>🔗 Slug: {{ $news->slug }}</p>
                </div>
            </div>
        @endif

    </div>

</div>

@push('scripts')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (document.querySelector('#content-editor')) {
            tinymce.init({
                selector: '#content-editor',
                height: 480,
                menubar: false,
                plugins: 'lists link table code fullscreen preview wordcount',
                toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | link table | code fullscreen preview',
                branding: false,
                promotion: false
            });
        }
    });
</script>
@endpush