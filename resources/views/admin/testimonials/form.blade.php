<div class="grid gap-6 lg:grid-cols-3">
    <div class="lg:col-span-2 space-y-6">

        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                    👤 Nama
                </label>
                <input type="text"
                       name="name"
                       value="{{ old('name', $testimonial?->name) }}"
                       placeholder="Nama alumni / wali santri"
                       class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-pink-500 focus:ring-pink-500"
                       required>
                @error('name')
                    <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                    🏷️ Peran
                </label>
                <input type="text"
                       name="role"
                       value="{{ old('role', $testimonial?->role) }}"
                       placeholder="Contoh: Alumni 2020 / Wali Santri"
                       class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-pink-500 focus:ring-pink-500">
            </div>
        </div>

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                💬 Pesan Testimoni
            </label>
            <textarea name="message"
                      rows="10"
                      placeholder="Tulis pesan testimoni..."
                      class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-medium leading-relaxed focus:border-pink-500 focus:ring-pink-500"
                      required>{{ old('message', $testimonial?->message) }}</textarea>
            @error('message')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

    </div>

    <div class="space-y-6">

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                📸 Foto
            </label>

            @if($testimonial?->photo)
                <img src="{{ asset('storage/' . $testimonial->photo) }}"
                     class="mb-4 h-48 w-full rounded-2xl object-cover shadow">
            @else
                <div class="mb-4 flex h-48 w-full items-center justify-center rounded-2xl bg-gradient-to-br from-pink-100 to-purple-100 text-5xl">
                    ⭐
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
                ⭐ Rating
            </label>
            <select name="rating"
                    class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-pink-500 focus:ring-pink-500">
                @for($i = 5; $i >= 1; $i--)
                    <option value="{{ $i }}" @selected(old('rating', $testimonial?->rating ?? 5) == $i)>
                        {{ $i }} Bintang
                    </option>
                @endfor
            </select>
        </div>

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                🚦 Status
            </label>
            <select name="status"
                    class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 font-bold focus:border-pink-500 focus:ring-pink-500">
                <option value="draft" @selected(old('status', $testimonial?->status) === 'draft')>Draft</option>
                <option value="published" @selected(old('status', $testimonial?->status) === 'published')>Published</option>
            </select>
        </div>

    </div>
</div>