<div class="grid gap-6 lg:grid-cols-3">
    <div class="lg:col-span-2 space-y-6">

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                👳 Nama Ustadz
            </label>
            <input type="text"
                   name="name"
                   value="{{ old('name', $teacher?->name) }}"
                   class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-orange-500 focus:ring-orange-500"
                   required>
            @error('name')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                    🏷️ Jabatan
                </label>
                <input type="text"
                       name="position"
                       value="{{ old('position', $teacher?->position) }}"
                       placeholder="Contoh: Pengasuh Pondok"
                       class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-orange-500 focus:ring-orange-500">
            </div>

            <div>
                <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                    🎓 Pendidikan
                </label>
                <input type="text"
                       name="education"
                       value="{{ old('education', $teacher?->education) }}"
                       placeholder="Contoh: Lc., M.Pd"
                       class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-orange-500 focus:ring-orange-500">
            </div>
        </div>

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                📖 Biografi
            </label>
            <textarea name="bio"
                      rows="10"
                      placeholder="Tulis biografi singkat ustadz..."
                      class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-medium leading-relaxed focus:border-orange-500 focus:ring-orange-500">{{ old('bio', $teacher?->bio) }}</textarea>
        </div>

    </div>

    <div class="space-y-6">

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                📸 Foto
            </label>

            @if($teacher?->photo)
                <img src="{{ asset('storage/' . $teacher->photo) }}"
                     class="mb-4 h-48 w-full rounded-2xl object-cover shadow">
            @else
                <div class="mb-4 flex h-48 w-full items-center justify-center rounded-2xl bg-gradient-to-br from-yellow-100 to-orange-100 text-5xl">
                    👳
                </div>
            @endif

            <input type="file"
                   name="photo"
                   class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm">

            @error('photo')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                📱 Telepon
            </label>
            <input type="text"
                   name="phone"
                   value="{{ old('phone', $teacher?->phone) }}"
                   class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-orange-500 focus:ring-orange-500">
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                🔢 Urutan
            </label>
            <input type="number"
                   name="sort_order"
                   value="{{ old('sort_order', $teacher?->sort_order ?? 0) }}"
                   min="0"
                   class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-orange-500 focus:ring-orange-500">
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                🚦 Status
            </label>
            <select name="status"
                    class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-orange-500 focus:ring-orange-500">
                <option value="active" @selected(old('status', $teacher?->status) === 'active')>Aktif</option>
                <option value="inactive" @selected(old('status', $teacher?->status) === 'inactive')>Nonaktif</option>
            </select>
        </div>

    </div>
</div>