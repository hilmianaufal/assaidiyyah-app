<div class="grid gap-6 lg:grid-cols-3">
    <div class="lg:col-span-2 space-y-6">

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                🏷️ Nama Kategori
            </label>

            <input type="text"
                   name="name"
                   value="{{ old('name', $category?->name) }}"
                   placeholder="Contoh: Kegiatan Pondok"
                   class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-blue-500 focus:ring-blue-500"
                   required>

            @error('name')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                📖 Deskripsi
            </label>

            <textarea name="description"
                      rows="8"
                      placeholder="Tulis deskripsi kategori..."
                      class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-medium leading-relaxed focus:border-blue-500 focus:ring-blue-500">{{ old('description', $category?->description) }}</textarea>
        </div>

    </div>

    <div class="space-y-6">

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                🎨 Warna Kategori
            </label>

            <input type="color"
                   name="color"
                   value="{{ old('color', $category?->color ?? '#2563EB') }}"
                   class="h-14 w-full rounded-2xl border border-slate-200 bg-white p-2">

            <p class="mt-2 text-xs text-slate-500">
                Warna ini nanti dipakai untuk label kategori pada berita.
            </p>
        </div>

        <div class="rounded-3xl bg-blue-50 p-5 text-blue-700">
            <div class="text-3xl">💡</div>

            <h3 class="mt-3 font-black">
                Contoh Kategori
            </h3>

            <p class="mt-2 text-sm leading-relaxed">
                Kegiatan, Prestasi, Kajian, PPDB, Santri, Alumni, Pengumuman.
            </p>
        </div>

    </div>
</div>