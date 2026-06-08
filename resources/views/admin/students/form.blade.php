<div class="grid gap-6 lg:grid-cols-3">
    <div class="lg:col-span-2 space-y-6">
        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                    🆔 NIS
                </label>
                <input type="text" name="nis" value="{{ old('nis', $student?->nis) }}"
                       class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-emerald-500 focus:ring-emerald-500" required>
                @error('nis') <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p> @enderror
            </div>

            <div>
                <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                    👨‍🎓 Nama Santri
                </label>
                <input type="text" name="name" value="{{ old('name', $student?->name) }}"
                       class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-emerald-500 focus:ring-emerald-500" required>
                @error('name') <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid gap-6 sm:grid-cols-3">
            <div>
                <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">👤 Gender</label>
                <select name="gender" class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-bold focus:border-emerald-500 focus:ring-emerald-500" required>
                    <option value="male" @selected(old('gender', $student?->gender) === 'male')>Putra</option>
                    <option value="female" @selected(old('gender', $student?->gender) === 'female')>Putri</option>
                </select>
            </div>

            <div>
                <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">📍 Tempat Lahir</label>
                <input type="text" name="birth_place" value="{{ old('birth_place', $student?->birth_place) }}"
                       class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-emerald-500 focus:ring-emerald-500">
            </div>

            <div>
                <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">🎂 Tanggal Lahir</label>
                <input type="date" name="birth_date" value="{{ old('birth_date', $student?->birth_date?->format('Y-m-d')) }}"
                       class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-emerald-500 focus:ring-emerald-500">
            </div>
        </div>

        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">🏫 Kelas</label>
                <input type="text" name="class_name" value="{{ old('class_name', $student?->class_name) }}"
                       placeholder="Contoh: VII A"
                       class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-emerald-500 focus:ring-emerald-500">
            </div>

            <div>
                <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">🏠 Asrama</label>
                <input type="text" name="dormitory" value="{{ old('dormitory', $student?->dormitory) }}"
                       placeholder="Contoh: Asrama Umar"
                       class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-emerald-500 focus:ring-emerald-500">
            </div>
        </div>

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">🗺️ Alamat</label>
            <textarea name="address" rows="5"
                      class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-medium focus:border-emerald-500 focus:ring-emerald-500">{{ old('address', $student?->address) }}</textarea>
        </div>

        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">👨‍👩‍👧 Nama Wali</label>
                <input type="text" name="guardian_name" value="{{ old('guardian_name', $student?->guardian_name) }}"
                       class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-emerald-500 focus:ring-emerald-500">
            </div>

            <div>
                <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">📱 HP Wali</label>
                <input type="text" name="guardian_phone" value="{{ old('guardian_phone', $student?->guardian_phone) }}"
                       class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-emerald-500 focus:ring-emerald-500">
            </div>
        </div>
    </div>

    <div class="space-y-6">
        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">📸 Foto Santri</label>

            @if($student?->photo)
                <img src="{{ asset('storage/' . $student->photo) }}" class="mb-4 h-48 w-full rounded-2xl object-cover shadow">
            @else
                <div class="mb-4 flex h-48 w-full items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-100 to-cyan-100 text-5xl">
                    👨‍🎓
                </div>
            @endif

            <input type="file" name="photo" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm">
            @error('photo') <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p> @enderror
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">🚦 Status</label>
            <select name="status" class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-emerald-500 focus:ring-emerald-500">
                <option value="active" @selected(old('status', $student?->status) === 'active')>Aktif</option>
                <option value="alumni" @selected(old('status', $student?->status) === 'alumni')>Alumni</option>
                <option value="inactive" @selected(old('status', $student?->status) === 'inactive')>Nonaktif</option>
            </select>
        </div>
    </div>
</div>