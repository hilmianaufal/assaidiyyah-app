<x-admin-layout>
    <div class="space-y-6">

        <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-500 p-6 sm:p-8 text-white shadow-2xl shadow-emerald-200">
            <div class="absolute right-6 bottom-4 text-7xl opacity-20">📚</div>

            <a href="{{ route('admin.programs.index') }}"
               class="inline-flex items-center gap-2 rounded-full bg-white/20 px-4 py-2 text-sm font-bold">
                ← Kembali
            </a>

            <h1 class="mt-5 text-3xl sm:text-4xl font-black">
                Tambah Program
            </h1>

            <p class="mt-2 max-w-xl text-white/90">
                Tambahkan program unggulan pondok seperti Tahfidz, Kitab Kuning, Bahasa Arab, dan lainnya.
            </p>
        </div>

        <form action="{{ route('admin.programs.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="rounded-[2rem] bg-white p-5 sm:p-8 shadow-xl shadow-slate-200/70 space-y-6">
            @csrf

            @include('admin.programs.form', ['program' => null])

            <div class="flex flex-col sm:flex-row gap-3 pt-4">
                <button type="submit"
                        class="inline-flex flex-1 items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-emerald-500 to-cyan-500 px-5 py-4 font-black text-white shadow-xl shadow-emerald-200">
                    💾 Simpan Program
                </button>

                <a href="{{ route('admin.programs.index') }}"
                   class="inline-flex items-center justify-center rounded-2xl bg-slate-100 px-5 py-4 font-black text-slate-600">
                    Batal
                </a>
            </div>
        </form>

    </div>
</x-admin-layout>