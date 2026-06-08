<div class="grid gap-6 lg:grid-cols-3">

    <div class="lg:col-span-2 space-y-6">

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                📌 Judul Agenda
            </label>

            <input type="text"
                   name="title"
                   value="{{ old('title', $agenda?->title) }}"
                   placeholder="Contoh: Haflah Akhirussanah"
                   class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-purple-500 focus:ring-purple-500"
                   required>

            @error('title')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                📖 Deskripsi Agenda
            </label>

            <textarea name="description"
                      rows="12"
                      placeholder="Tulis deskripsi agenda..."
                      class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-medium leading-relaxed focus:border-purple-500 focus:ring-purple-500">{{ old('description', $agenda?->description) }}</textarea>

            @error('description')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

    </div>

    <div class="space-y-6">

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                📅 Tanggal Kegiatan
            </label>

            <input type="date"
                   name="event_date"
                   value="{{ old('event_date', $agenda?->event_date?->format('Y-m-d')) }}"
                   class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-purple-500 focus:ring-purple-500"
                   required>

            @error('event_date')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                ⏰ Waktu
            </label>

            <input type="time"
                   name="event_time"
                   value="{{ old('event_time', $agenda?->event_time) }}"
                   class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-purple-500 focus:ring-purple-500">

            @error('event_time')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                📍 Lokasi
            </label>

            <input type="text"
                   name="location"
                   value="{{ old('location', $agenda?->location) }}"
                   placeholder="Contoh: Aula Pondok"
                   class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-purple-500 focus:ring-purple-500">

            @error('location')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                🚦 Status
            </label>

            <select name="status"
                    class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-purple-500 focus:ring-purple-500">
                <option value="draft" @selected(old('status', $agenda?->status) === 'draft')>
                    Draft
                </option>

                <option value="published" @selected(old('status', $agenda?->status) === 'published')>
                    Published
                </option>
            </select>

            @error('status')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

    </div>

</div>