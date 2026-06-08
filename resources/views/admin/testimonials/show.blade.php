<x-admin-layout>
    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('admin.testimonials.index') }}"
               class="inline-flex w-fit items-center gap-2 rounded-2xl bg-white px-4 py-3 font-bold text-slate-600 shadow-sm">
                ← Kembali
            </a>

            <div class="flex gap-2">
                <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                   class="inline-flex items-center gap-2 rounded-2xl bg-yellow-400 px-5 py-3 font-black text-yellow-950">
                    ✏️ Edit
                </a>

                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus testimoni ini?')">
                    @csrf
                    @method('DELETE')

                    <button class="inline-flex items-center gap-2 rounded-2xl bg-red-500 px-5 py-3 font-black text-white">
                        🗑️ Hapus
                    </button>
                </form>
            </div>
        </div>

        <article class="overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-200/70">
            <div class="relative bg-gradient-to-br from-pink-500 via-rose-500 to-purple-600 p-8 sm:p-10 text-white">
                <div class="absolute right-8 bottom-4 text-8xl opacity-20">⭐</div>

                <div class="relative z-10 flex flex-col gap-6 sm:flex-row sm:items-center">
                    @if($testimonial->photo)
                        <img src="{{ asset('storage/' . $testimonial->photo) }}"
                             class="h-32 w-32 rounded-[2rem] object-cover ring-4 ring-white/30">
                    @else
                        <div class="flex h-32 w-32 items-center justify-center rounded-[2rem] bg-white/20 text-6xl ring-4 ring-white/30">
                            ⭐
                        </div>
                    @endif

                    <div>
                        <span class="rounded-full bg-white/20 px-3 py-1 text-xs font-black">
                            {{ ucfirst($testimonial->status) }}
                        </span>

                        <h1 class="mt-4 text-3xl sm:text-5xl font-black">
                            {{ $testimonial->name }}
                        </h1>

                        <p class="mt-2 text-white/85 font-bold">
                            {{ $testimonial->role ?: 'Alumni / Wali Santri' }}
                        </p>

                        <div class="mt-3 text-yellow-300 text-2xl">
                            @for($i = 1; $i <= 5; $i++)
                                {{ $i <= $testimonial->rating ? '★' : '☆' }}
                            @endfor
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6 sm:p-8">
                <div class="rounded-3xl bg-pink-50 p-6 text-pink-800">
                    <div class="text-3xl">💬</div>
                    <p class="mt-4 text-lg leading-relaxed font-semibold">
                        “{!! nl2br(e($testimonial->message)) !!}”
                    </p>
                </div>
            </div>
        </article>
    </div>
</x-admin-layout>