<div class="grid gap-6 lg:grid-cols-3">

    <div class="lg:col-span-2 space-y-6">

        <div class="rounded-3xl bg-indigo-50 p-5">
            <p class="text-sm font-black text-indigo-700">
                📝 No. Pendaftaran
            </p>
            <p class="mt-1 text-2xl font-black text-indigo-900">
                {{ $registration->registration_number }}
            </p>
        </div>

        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                    👨‍🎓 Nama Calon Santri
                </label>

                <input type="text"
                       name="student_name"
                       value="{{ old('student_name', $registration->student_name) }}"
                       class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-indigo-500 focus:ring-indigo-500"
                       required>

                @error('student_name')
                    <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                    👤 Jenis Kelamin
                </label>

                <select name="gender"
                        class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-bold focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="male" @selected(old('gender', $registration->gender) === 'male')>Putra</option>
                    <option value="female" @selected(old('gender', $registration->gender) === 'female')>Putri</option>
                </select>
            </div>
        </div>

        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                    📍 Tempat Lahir
                </label>

                <input type="text"
                       name="birth_place"
                       value="{{ old('birth_place', $registration->birth_place) }}"
                       class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                    🎂 Tanggal Lahir
                </label>

                <input type="date"
                       name="birth_date"
                       value="{{ old('birth_date', $registration->birth_date?->format('Y-m-d')) }}"
                       class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-indigo-500 focus:ring-indigo-500">
            </div>
        </div>

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                🗺️ Alamat
            </label>

            <textarea name="address"
                      rows="5"
                      class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-medium focus:border-indigo-500 focus:ring-indigo-500">{{ old('address', $registration->address) }}</textarea>
        </div>

        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                    👨‍👩‍👧 Nama Wali
                </label>

                <input type="text"
                       name="guardian_name"
                       value="{{ old('guardian_name', $registration->guardian_name) }}"
                       class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-indigo-500 focus:ring-indigo-500"
                       required>
            </div>

            <div>
                <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                    📱 HP Wali
                </label>

                <input type="text"
                       name="guardian_phone"
                       value="{{ old('guardian_phone', $registration->guardian_phone) }}"
                       class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-indigo-500 focus:ring-indigo-500"
                       required>
            </div>
        </div>

    </div>

    <div class="space-y-6">

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                🏫 Asal Sekolah
            </label>

            <input type="text"
                   name="school_origin"
                   value="{{ old('school_origin', $registration->school_origin) }}"
                   class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-indigo-500 focus:ring-indigo-500">
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                📚 Pilihan Program
            </label>

            <input type="text"
                   name="program_choice"
                   value="{{ old('program_choice', $registration->program_choice) }}"
                   placeholder="Tahfidz / Kitab / Reguler"
                   class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-indigo-500 focus:ring-indigo-500">
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                🚦 Status PPDB
            </label>

            <select name="status"
                    class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-indigo-500 focus:ring-indigo-500">
                <option value="pending" @selected(old('status', $registration->status) === 'pending')>Pending</option>
                <option value="verified" @selected(old('status', $registration->status) === 'verified')>Verified</option>
                <option value="accepted" @selected(old('status', $registration->status) === 'accepted')>Accepted</option>
                <option value="rejected" @selected(old('status', $registration->status) === 'rejected')>Rejected</option>
            </select>
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                🗒️ Catatan
            </label>

            <textarea name="notes"
                      rows="6"
                      class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-medium focus:border-indigo-500 focus:ring-indigo-500">{{ old('notes', $registration->notes) }}</textarea>
        </div>

    </div>

</div>