<nav class="fixed bottom-4 left-4 right-4 z-50 lg:hidden">
    <div class="rounded-[2rem] border border-white/20 bg-white/90 p-2 shadow-2xl shadow-blue-950/20 backdrop-blur-xl">

        <div class="grid grid-cols-5 gap-1">

            <a href="{{ route('home') }}"
               class="group flex flex-col items-center justify-center rounded-2xl px-2 py-2 transition hover:bg-blue-50">
                <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-500 to-cyan-400 text-lg text-white shadow-lg shadow-blue-200 transition group-hover:scale-110">
                    🏠
                </div>
                <span class="mt-1 text-[10px] font-black text-slate-600 group-hover:text-blue-600">
                    Home
                </span>
            </a>

            <a href="{{ route('news.index') }}"
               class="group flex flex-col items-center justify-center rounded-2xl px-2 py-2 transition hover:bg-indigo-50">
                <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-500 to-blue-500 text-lg text-white shadow-lg shadow-indigo-200 transition group-hover:scale-110">
                    📰
                </div>
                <span class="mt-1 text-[10px] font-black text-slate-600 group-hover:text-indigo-600">
                    Berita
                </span>
            </a>

            <a href="{{ route('ppdb.create') }}"
               class="group -mt-5 flex flex-col items-center justify-center rounded-2xl px-2 py-2 transition">
                <div class="flex h-14 w-14 items-center justify-center rounded-[1.4rem] bg-gradient-to-br from-emerald-500 to-cyan-400 text-2xl text-white shadow-2xl shadow-emerald-200 ring-4 ring-white transition group-hover:scale-110">
                    📝
                </div>
                <span class="mt-1 text-[10px] font-black text-emerald-600">
                    PPDB
                </span>
            </a>

            <a href="{{ route('programs.index') }}"
               class="group flex flex-col items-center justify-center rounded-2xl px-2 py-2 transition hover:bg-orange-50">
                <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-br from-orange-500 to-yellow-400 text-lg text-white shadow-lg shadow-orange-200 transition group-hover:scale-110">
                    📚
                </div>
                <span class="mt-1 text-[10px] font-black text-slate-600 group-hover:text-orange-600">
                    Program
                </span>
            </a>

            <a href="{{ route('contact') }}"
               class="group flex flex-col items-center justify-center rounded-2xl px-2 py-2 transition hover:bg-pink-50">
                <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-br from-pink-500 to-rose-400 text-lg text-white shadow-lg shadow-pink-200 transition group-hover:scale-110">
                    📞
                </div>
                <span class="mt-1 text-[10px] font-black text-slate-600 group-hover:text-pink-600">
                    Kontak
                </span>
            </a>

        </div>

    </div>
</nav>