<x-admin-layout>
    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('admin.teachers.index') }}"
               class="inline-flex w-fit items-center gap-2 rounded-2xl bg-white px-4 py-3 font-bold text-slate-600 shadow-sm">
                ← Kembali
            </a>

            <div class="flex gap-2">
                <a href="{{ route('admin.teachers.edit', $teacher) }}"
                   class="inline-flex items-center gap-2 rounded-2xl bg-yellow-400 px-5 py-3 font-black text-yellow-950">
                    ✏️ Edit
                </a>

                <form action="{{ route('admin.teachers.destroy', $teacher) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus data ustadz ini?')">
                    @csrf
                    @method('DELETE')

                    <button class="inline-flex items-center gap-2 rounded-2xl bg-red-500 px-5 py-3 font-black text-white">
                        🗑️ Hapus
                    </button>
                </form>
            </div>
        </div>

        <article class="overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-200/70">
            <div class="relative bg-gradient-to-br from-yellow-500 via-orange-500 to-red-500 p-8 sm:p-10 text-white">
                <div class="absolute right-8 bottom-4 text-8xl opacity-20">👳</div>

                <div class="relative z-10 flex flex-col gap-6 sm:flex-row sm:items-center">
                    @if($teacher->photo)
                        <img src="{{ asset('storage/' . $teacher->photo) }}"
                             class="h-32 w-32 rounded-[2rem] object-cover ring-4 ring-white/30">
                    @else
                        <div class="flex h-32 w-32 items-center justify-center rounded-[2rem] bg-white/20 text-6xl ring-4 ring-white/30">
                            👳
                        </div>
                    @endif

                    <div>
                        <span class="rounded-full bg-white/20 px-3 py-1 text-xs font-black">
                            {{ $teacher->status === 'active' ? 'Aktif' : 'Nonaktif' }}
                        </span>

                        <h1 class="mt-4 text-3xl sm:text-5xl font-black">
                            {{ $teacher->name }}
                        </h1>

                        <p class="mt-2 text-white/85 font-bold">
                            {{ $teacher->position ?: 'Ustadz / Pengajar' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="grid gap-5 p-6 sm:p-8 md:grid-cols-2 xl:grid-cols-3">
                @php
                    $items = [
                        ['label' => 'Jabatan', 'value' => $teacher->position ?: '-', 'icon' => '🏷️'],
                        ['label' => 'Pendidikan', 'value' => $teacher->education ?: '-', 'icon' => '🎓'],
                        ['label' => 'Telepon', 'value' => $teacher->phone ?: '-', 'icon' => '📱'],
                        ['label' => 'Urutan', 'value' => $teacher->sort_order, 'icon' => '🔢'],
                        ['label' => 'Status', 'value' => $teacher->status === 'active' ? 'Aktif' : 'Nonaktif', 'icon' => '🚦'],
                    ];
                @endphp

                @foreach($items as $item)
                    <div class="rounded-3xl bg-slate-50 p-5">
                        <div class="text-2xl">{{ $item['icon'] }}</div>
                        <p class="mt-3 text-sm font-bold text-slate-500">{{ $item['label'] }}</p>
                        <p class="mt-1 font-black text-slate-900">{{ $item['value'] }}</p>
                    </div>
                @endforeach

                <div class="rounded-3xl bg-orange-50 p-5 md:col-span-2 xl:col-span-3">
                    <div class="text-2xl">📖</div>
                    <p class="mt-3 text-sm font-bold text-orange-600">Biografi</p>
                    <p class="mt-2 leading-relaxed font-medium text-orange-900">
                        {!! nl2br(e($teacher->bio ?: 'Belum ada biografi.')) !!}
                    </p>
                </div>
            </div>
        </article>
    </div>
</x-admin-layout>