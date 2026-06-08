<div class="grid gap-6 lg:grid-cols-3">

    <div class="lg:col-span-2 space-y-6">

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                📝 Judul Foto
            </label>

            <input type="text"
                   name="title"
                   value="{{ old('title', $gallery?->title) }}"
                   placeholder="Contoh: Kegiatan Santri Mengaji"
                   class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-pink-500 focus:ring-pink-500"
                   required>

            @error('title')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                🏷️ Kategori
            </label>

            <input type="text"
                   name="category"
                   value="{{ old('category', $gallery?->category) }}"
                   placeholder="Contoh: Kegiatan, Fasilitas, Santri"
                   class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-pink-500 focus:ring-pink-500">

            @error('category')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                📖 Deskripsi
            </label>

            <textarea name="description"
                      rows="10"
                      placeholder="Tulis deskripsi foto..."
                      class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-medium leading-relaxed focus:border-pink-500 focus:ring-pink-500">{{ old('description', $gallery?->description) }}</textarea>

            @error('description')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

    </div>

    <div class="space-y-6">

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                🖼️ Upload Foto
            </label>

            @if($gallery?->image)
                <img src="{{ asset('storage/' . $gallery->image) }}"
                     class="mb-4 h-48 w-full rounded-2xl object-cover shadow">
            @else
                <div class="mb-4 flex h-48 w-full items-center justify-center rounded-2xl bg-gradient-to-br from-pink-100 to-orange-100 text-5xl">
                    🖼️
                </div>
            @endif

            <input type="file"
                   name="image"
                   class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm"
                   {{ $gallery ? '' : 'required' }}>

            <p class="mt-2 text-xs text-slate-500">
                Format: JPG, PNG, WEBP. Maksimal 2MB.
            </p>

            @error('image')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                🚦 Status
            </label>

            <select name="status"
                    class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-pink-500 focus:ring-pink-500">
                <option value="draft" @selected(old('status', $gallery?->status) === 'draft')>
                    Draft
                </option>

                <option value="published" @selected(old('status', $gallery?->status) === 'published')>
                    Published
                </option>
            </select>

            @error('status')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div class="rounded-3xl bg-pink-50 p-5 text-pink-700">
            <div class="text-3xl">📸</div>

            <h3 class="mt-3 font-black">
                Tips Galeri
            </h3>

            <p class="mt-2 text-sm leading-relaxed">
                Gunakan foto landscape yang jelas dan terang agar tampilan website terlihat profesional.
            </p>
        </div>

    </div>

</div>