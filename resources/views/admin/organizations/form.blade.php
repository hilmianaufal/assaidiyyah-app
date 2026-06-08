<div class="grid gap-6 lg:grid-cols-3">
    <div class="lg:col-span-2 space-y-6">

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                👤 Nama
            </label>
            <input type="text"
                   name="name"
                   value="{{ old('name', $organization?->name) }}"
                   placeholder="Contoh: KH. Ahmad Assaidiyyah"
                   class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-blue-500 focus:ring-blue-500"
                   required>
            @error('name')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                🏷️ Jabatan
            </label>
            <input type="text"
                   name="position"
                   value="{{ old('position', $organization?->position) }}"
                   placeholder="Contoh: Pimpinan Pondok"
                   class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-blue-500 focus:ring-blue-500"
                   required>
            @error('position')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                📖 Biografi
            </label>
            <textarea name="bio"
                      rows="10"
                      placeholder="Tulis biografi singkat..."
                      class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-medium leading-relaxed focus:border-blue-500 focus:ring-blue-500">{{ old('bio', $organization?->bio) }}</textarea>
        </div>

    </div>

    <div class="space-y-6">

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                📸 Foto
            </label>

            @if($organization?->photo)
                <img src="{{ asset('storage/' . $organization->photo) }}"
                     class="mb-4 h-48 w-full rounded-2xl object-cover shadow">
            @else
                <div class="mb-4 flex h-48 w-full items-center justify-center rounded-2xl bg-gradient-to-br from-blue-100 to-cyan-100 text-5xl">
                    🏢
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
                🔢 Urutan
            </label>
            <input type="number"
                   name="sort_order"
                   value="{{ old('sort_order', $organization?->sort_order ?? 0) }}"
                   min="0"
                   class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-blue-500 focus:ring-blue-500">
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                🚦 Status
            </label>
            <select name="status"
                    class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-blue-500 focus:ring-blue-500">
                <option value="active" @selected(old('status', $organization?->status) === 'active')>Aktif</option>
                <option value="inactive" @selected(old('status', $organization?->status) === 'inactive')>Nonaktif</option>
            </select>
        </div>

    </div>
</div>