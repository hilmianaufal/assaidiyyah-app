<div>
    <label class="mb-2 flex items-center gap-2 text-sm font-black text-slate-700">
        #️⃣ Nama Tag
    </label>

    <input type="text"
           name="name"
           value="{{ old('name', $tag?->name) }}"
           placeholder="Contoh: Tahfidz"
           class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 font-semibold focus:border-indigo-500 focus:ring-indigo-500"
           required>

    @error('name')
        <p class="mt-2 text-sm font-semibold text-red-600">⚠️ {{ $message }}</p>
    @enderror
</div>