<x-admin-layout>
    <div class="space-y-6">
        <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-yellow-400 via-pink-500 to-purple-600 p-6 sm:p-8 text-white shadow-2xl shadow-pink-200">
            <div class="absolute right-6 bottom-4 text-7xl opacity-20">✏️</div>

            <a href="{{ route('admin.testimonials.index') }}"
               class="inline-flex items-center gap-2 rounded-full bg-white/20 px-4 py-2 text-sm font-bold">
                ← Kembali
            </a>

            <h1 class="mt-5 text-3xl sm:text-4xl font-black">
                Edit Testimoni
            </h1>

            <p class="mt-2 max-w-xl text-white/90">
                Perbarui nama, peran, foto, rating, pesan, dan status testimoni.
            </p>
        </div>

        <form action="{{ route('admin.testimonials.update', $testimonial) }}"
              method="POST"
              enctype="multipart/form-data"
              class="rounded-[2rem] bg-white p-5 sm:p-8 shadow-xl shadow-slate-200/70 space-y-6">
            @csrf
            @method('PUT')

            @include('admin.testimonials.form', ['testimonial' => $testimonial])

            <div class="flex flex-col sm:flex-row gap-3 pt-4">
                <button type="submit"
                        class="inline-flex flex-1 items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-pink-500 to-purple-600 px-5 py-4 font-black text-white shadow-xl shadow-pink-200">
                    💾 Update Testimoni
                </button>

                <a href="{{ route('admin.testimonials.show', $testimonial) }}"
                   class="inline-flex items-center justify-center rounded-2xl bg-blue-50 px-5 py-4 font-black text-blue-600">
                    👁️ Lihat
                </a>

                <a href="{{ route('admin.testimonials.index') }}"
                   class="inline-flex items-center justify-center rounded-2xl bg-slate-100 px-5 py-4 font-black text-slate-600">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>