<div class="grid gap-6 lg:grid-cols-3">
    <div class="lg:col-span-2 space-y-6">

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                🏆 Judul Prestasi
            </label>
            <input type="text"
                   name="title"
                   value="{{ old('title', $achievement?->title) }}"
                   placeholder="Contoh: Juara 1 Lomba Tahfidz Tingkat Kabupaten"
                   class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-orange-500 focus:ring-orange-500"
                   required>
            @error('title')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div class="grid gap-6 sm:grid-cols-3">
            <div>
                <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                    👨‍🎓 Nama Santri
                </label>
                <input type="text"
                       name="student_name"
                       value="{{ old('student_name', $achievement?->student_name) }}"
                       placeholder="Nama santri"
                       class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-orange-500 focus:ring-orange-500">
            </div>

            <div>
                <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                    🌟 Tingkat
                </label>
                <input type="text"
                       name="level"
                       value="{{ old('level', $achievement?->level) }}"
                       placeholder="Kabupaten/Nasional"
                       class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-orange-500 focus:ring-orange-500">
            </div>

            <div>
                <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                    🏷️ Kategori
                </label>
                <input type="text"
                       name="category"
                       value="{{ old('category', $achievement?->category) }}"
                       placeholder="Tahfidz/Akademik"
                       class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-orange-500 focus:ring-orange-500">
            </div>
        </div>

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                📖 Deskripsi
            </label>
            <textarea name="description"
                      rows="10"
                      placeholder="Tulis deskripsi prestasi..."
                      class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-medium leading-relaxed focus:border-orange-500 focus:ring-orange-500">{{ old('description', $achievement?->description) }}</textarea>
        </div>

    </div>

    <div class="space-y-6">

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                🖼️ Foto Prestasi
            </label>

            @if($achievement?->image)
                <img src="{{ asset('storage/' . $achievement->image) }}"
                     class="mb-4 h-48 w-full rounded-2xl object-cover shadow">
            @else
                <div class="mb-4 flex h-48 w-full items-center justify-center rounded-2xl bg-gradient-to-br from-yellow-100 to-orange-100 text-5xl">
                    🏆
                </div>
            @endif

            <input type="file"
                   name="image"
                   class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm">

            @error('image')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                📅 Tanggal Prestasi
            </label>
            <input type="date"
                   name="achievement_date"
                   value="{{ old('achievement_date', $achievement?->achievement_date?->format('Y-m-d')) }}"
                   class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-orange-500 focus:ring-orange-500">
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                🚦 Status
            </label>
            <select name="status"
                    class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-orange-500 focus:ring-orange-500">
                <option value="draft" @selected(old('status', $achievement?->status) === 'draft')>Draft</option>
                <option value="published" @selected(old('status', $achievement?->status) === 'published')>Published</option>
            </select>
        </div>

    </div>
</div>