<x-admin-layout>
    <div class="space-y-6">

        <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-pink-500 via-rose-500 to-purple-600 p-6 sm:p-8 text-white shadow-2xl shadow-pink-200">
            <div class="absolute right-8 bottom-4 text-7xl opacity-20">⭐</div>

            <div class="relative z-10 flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <div class="inline-flex items-center gap-2 rounded-full bg-white/20 px-4 py-2 text-sm font-bold">
                        ✨ Suara Alumni & Wali
                    </div>

                    <h1 class="mt-5 text-3xl sm:text-4xl font-black">
                        Testimoni
                    </h1>

                    <p class="mt-2 max-w-xl text-white/90">
                        Kelola testimoni alumni, wali santri, dan tokoh masyarakat.
                    </p>
                </div>

                <a href="{{ route('admin.testimonials.create') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-2xl bg-white px-5 py-3.5 font-black text-pink-600 shadow-xl">
                    ➕ Tambah Testimoni
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="rounded-3xl border border-emerald-100 bg-emerald-50 p-4 text-sm font-bold text-emerald-700">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-3">
            @forelse($testimonials as $testimonial)
                <div class="rounded-[2rem] bg-white p-5 shadow-xl shadow-slate-200/70 border border-white transition hover:-translate-y-1 hover:shadow-2xl">

                    <div class="flex items-start justify-between gap-4">
                        <div class="flex items-center gap-4">
                            @if($testimonial->photo)
                                <img src="{{ asset('storage/' . $testimonial->photo) }}"
                                     class="h-16 w-16 rounded-3xl object-cover ring-4 ring-pink-100">
                            @else
                                <div class="flex h-16 w-16 items-center justify-center rounded-3xl bg-pink-50 text-3xl ring-4 ring-pink-100">
                                    ⭐
                                </div>
                            @endif

                            <div>
                                <h2 class="text-lg font-black">
                                    {{ $testimonial->name }}
                                </h2>
                                <p class="text-sm font-bold text-slate-500">
                                    {{ $testimonial->role ?: 'Alumni / Wali Santri' }}
                                </p>
                            </div>
                        </div>

                        <span class="rounded-full px-3 py-1 text-xs font-black
                            {{ $testimonial->status === 'published' ? 'bg-emerald-50 text-emerald-600' : 'bg-yellow-50 text-yellow-600' }}">
                            {{ ucfirst($testimonial->status) }}
                        </span>
                    </div>

                    <div class="mt-4 text-yellow-400 text-lg">
                        @for($i = 1; $i <= 5; $i++)
                            {{ $i <= $testimonial->rating ? '★' : '☆' }}
                        @endfor
                    </div>

                    <p class="mt-4 line-clamp-3 text-sm leading-relaxed text-slate-500">
                        “{{ $testimonial->message }}”
                    </p>

                    <div class="mt-5 flex items-center justify-between gap-2">
                        <span class="text-xs font-bold text-slate-500">
                            🗓️ {{ $testimonial->created_at->format('d M Y') }}
                        </span>

                        <div class="flex gap-2">
                            <a href="{{ route('admin.testimonials.show', $testimonial) }}"
                               class="flex h-10 w-10 items-center justify-center rounded-2xl bg-blue-50 text-lg">
                                👁️
                            </a>

                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                               class="flex h-10 w-10 items-center justify-center rounded-2xl bg-yellow-50 text-lg">
                                ✏️
                            </a>

                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus testimoni ini?')">
                                @csrf
                                @method('DELETE')

                                <button class="flex h-10 w-10 items-center justify-center rounded-2xl bg-red-50 text-lg">
                                    🗑️
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="sm:col-span-2 xl:col-span-3 rounded-[2rem] bg-white p-10 text-center shadow-xl shadow-slate-200/70">
                    <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-[2rem] bg-pink-50 text-5xl">
                        ⭐
                    </div>

                    <h3 class="mt-5 text-2xl font-black">
                        Belum ada testimoni
                    </h3>

                    <p class="mt-2 text-slate-500">
                        Tambahkan testimoni pertama dari alumni atau wali santri.
                    </p>

                    <a href="{{ route('admin.testimonials.create') }}"
                       class="mt-6 inline-flex items-center gap-2 rounded-2xl bg-pink-500 px-5 py-3 font-black text-white shadow-lg shadow-pink-200">
                        ➕ Tambah Testimoni
                    </a>
                </div>
            @endforelse
        </div>

        <div>
            {{ $testimonials->links() }}
        </div>

    </div>
</x-admin-layout>