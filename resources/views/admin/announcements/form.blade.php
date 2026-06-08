<div class="grid gap-6 lg:grid-cols-3">

    <div class="lg:col-span-2 space-y-6">

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                📌 Judul Pengumuman
            </label>

            <input type="text"
                   name="title"
                   value="{{ old('title', $announcement?->title) }}"
                   placeholder="Contoh: Libur Awal Ramadhan"
                   class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-orange-500 focus:ring-orange-500"
                   required>

            @error('title')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                📖 Isi Pengumuman
            </label>

            <textarea name="content"
                      rows="12"
                      placeholder="Tulis isi pengumuman..."
                      class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-medium leading-relaxed focus:border-orange-500 focus:ring-orange-500"
                      required>{{ old('content', $announcement?->content) }}</textarea>

            @error('content')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

    </div>

    <div class="space-y-6">

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                🗓️ Tanggal Publikasi
            </label>

            <input type="date"
                   name="published_at"
                   value="{{ old('published_at', $announcement?->published_at?->format('Y-m-d')) }}"
                   class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-orange-500 focus:ring-orange-500">

            @error('published_at')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                🚦 Status
            </label>

            <select name="status"
                    class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-orange-500 focus:ring-orange-500">
                <option value="draft" @selected(old('status', $announcement?->status) === 'draft')>
                    Draft
                </option>

                <option value="published" @selected(old('status', $announcement?->status) === 'published')>
                    Published
                </option>
            </select>

            @error('status')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div class="rounded-3xl bg-orange-50 p-5 text-orange-700">
            <div class="text-3xl">📢</div>

            <h3 class="mt-3 font-black">
                Tips Pengumuman
            </h3>

            <p class="mt-2 text-sm leading-relaxed">
                Gunakan kalimat singkat, jelas, dan sertakan tanggal penting agar mudah dipahami.
            </p>
        </div>

    </div>

</div>