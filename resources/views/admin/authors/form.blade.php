<div class="grid gap-6 lg:grid-cols-3">
    <div class="lg:col-span-2 space-y-6">

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                ✍️ Nama Penulis
            </label>

            <input type="text"
                   name="name"
                   value="{{ old('name', $author?->name) }}"
                   placeholder="Contoh: Ahmad Fauzi"
                   class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-blue-500 focus:ring-blue-500"
                   required>

            @error('name')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                    🏫 Kelas
                </label>

                <input type="text"
                       name="class_name"
                       value="{{ old('class_name', $author?->class_name) }}"
                       placeholder="Contoh: XII A / Alumni 2024"
                       class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                    🏷️ Peran
                </label>

                <input type="text"
                       name="role"
                       value="{{ old('role', $author?->role) }}"
                       placeholder="Contoh: Santri / Admin Media"
                       class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-blue-500 focus:ring-blue-500">
            </div>
        </div>

        <div>
            <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
                📖 Biografi
            </label>

            <textarea name="bio"
                      rows="10"
                      placeholder="Tulis biografi singkat penulis..."
                      class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-medium leading-relaxed focus:border-blue-500 focus:ring-blue-500">{{ old('bio', $author?->bio) }}</textarea>
        </div>

    </div>

    <div class="space-y-6">

        <div class="rounded-3xl bg-slate-50 p-5">
            <label class="mb-3 flex items-center gap-2 text-sm font-black text-slate-700">
                📸 Foto Penulis
            </label>

            @if($author?->photo)
                <img src="{{ asset('storage/' . $author->photo) }}"
                     class="mb-4 h-48 w-full rounded-2xl object-cover shadow">
            @else
                <div class="mb-4 flex h-48 w-full items-center justify-center rounded-2xl bg-gradient-to-br from-blue-100 to-cyan-100 text-5xl">
                    ✍️
                </div>
            @endif

            <input type="file"
                   name="photo"
                   class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm">

            @error('photo')
                <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div class="rounded-3xl bg-blue-50 p-5 text-blue-700">
            <div class="text-3xl">💡</div>

            <h3 class="mt-3 font-black">
                Tips Penulis
            </h3>

            <p class="mt-2 text-sm leading-relaxed">
                Penulis bisa berasal dari admin media, santri, alumni, atau ustadz pondok.
            </p>
        </div>

    </div>
</div>