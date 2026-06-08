<section id="program" class="bg-slate-50 px-4 py-16 text-slate-900 sm:py-20">

    <div class="mx-auto max-w-7xl">

        <div class="mb-8 flex items-end justify-between gap-4">
            <div>
                <div class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-4 py-2 text-xs font-black text-blue-700">
                    📚 PROGRAM UNGGULAN
                </div>

                <h2 class="mt-4 text-2xl font-black sm:text-4xl">
                    Pilihan Program
                </h2>
            </div>

            <a href="{{ route('programs.index') }}"
               class="hidden rounded-2xl bg-white px-5 py-3 text-sm font-black text-blue-700 shadow-lg shadow-blue-100 sm:inline-flex">
                Lihat Semua →
            </a>
        </div>

        <div class="grid grid-cols-3 gap-3 sm:gap-5">

            @forelse($programs as $program)

                <a href="{{ route('programs.index') }}"
                   class="group relative overflow-hidden rounded-3xl border border-white bg-white p-4 text-center shadow-xl shadow-slate-200/70 transition duration-300 hover:-translate-y-1 hover:border-blue-200 hover:shadow-2xl hover:shadow-blue-100 sm:p-6">

                    <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-blue-600 to-cyan-400 opacity-0 transition group-hover:opacity-100"></div>

                    <div class="mx-auto flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-600 to-cyan-500 text-xl text-white shadow-lg shadow-blue-100 transition duration-300 group-hover:scale-110 sm:h-14 sm:w-14 sm:text-2xl">
                        {{ $program->icon ?: '📖' }}
                    </div>

                    <h3 class="mt-3 line-clamp-2 text-xs font-black leading-tight text-slate-900 transition group-hover:text-blue-700 sm:mt-4 sm:text-base">
                        {{ $program->title }}
                    </h3>

                    <div class="mx-auto mt-3 h-1 w-8 rounded-full bg-blue-100 transition group-hover:w-12 group-hover:bg-blue-500"></div>

                </a>

            @empty

                <div class="col-span-3 rounded-[2rem] bg-white p-10 text-center shadow-xl">
                    <div class="text-5xl">📚</div>

                    <h3 class="mt-4 text-xl font-black">
                        Belum Ada Program
                    </h3>

                    <p class="mt-2 text-sm text-slate-500">
                        Tambahkan program unggulan dari dashboard admin.
                    </p>
                </div>

            @endforelse

        </div>

        <a href="{{ route('programs.index') }}"
           class="mt-6 flex items-center justify-center rounded-2xl bg-blue-600 px-5 py-3 text-sm font-black text-white shadow-lg shadow-blue-200 sm:hidden">
            Lihat Semua Program →
        </a>

    </div>

</section>