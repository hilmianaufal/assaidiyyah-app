<div class="grid gap-6 lg:grid-cols-3">

    <div class="lg:col-span-2 space-y-6">

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                📝 Nama Program
            </label>

            <input type="text"
                   name="title"
                   value="{{ old('title', $program?->title) }}"
                   placeholder="Contoh: Tahfidz Al-Qur'an"
                   class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-emerald-500 focus:ring-emerald-500"
                   required>

            @error('title')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                📖 Deskripsi Program
            </label>

            <textarea name="description"
                      rows="12"
                      placeholder="Tulis deskripsi program..."
                      class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-medium leading-relaxed focus:border-emerald-500 focus:ring-emerald-500">{{ old('description', $program?->description) }}</textarea>

            @error('description')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

    </div>

    <div class="space-y-6">

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                🎨 Icon Emoji
            </label>

            <input type="text"
                   name="icon"
                   value="{{ old('icon', $program?->icon) }}"
                   placeholder="Contoh: 📖"
                   maxlength="10"
                   class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 text-2xl font-bold focus:border-emerald-500 focus:ring-emerald-500">

            <p class="mt-2 text-xs text-slate-500">
                Bisa isi emoji seperti 📖 🕌 🎓 🌙.
            </p>

            @error('icon')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                🖼️ Gambar Program
            </label>

            @if($program?->image)
                <img src="{{ asset('storage/' . $program->image) }}"
                     class="mb-4 h-44 w-full rounded-2xl object-cover shadow">
            @else
                <div class="mb-4 flex h-44 w-full items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-100 to-cyan-100 text-5xl">
                    📚
                </div>
            @endif

            <input type="file"
                   name="image"
                   class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm">

            <p class="mt-2 text-xs text-slate-500">
                Opsional. Format JPG/PNG/WEBP maksimal 2MB.
            </p>

            @error('image')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                🔢 Urutan
            </label>

            <input type="number"
                   name="sort_order"
                   value="{{ old('sort_order', $program?->sort_order ?? 0) }}"
                   min="0"
                   class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-emerald-500 focus:ring-emerald-500">

            @error('sort_order')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                🚦 Status
            </label>

            <select name="status"
                    class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-emerald-500 focus:ring-emerald-500">
                <option value="draft" @selected(old('status', $program?->status) === 'draft')>
                    Draft
                </option>

                <option value="published" @selected(old('status', $program?->status) === 'published')>
                    Published
                </option>
            </select>

            @error('status')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

    </div>

</div>