<x-admin-layout>
    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('admin.students.index') }}"
               class="inline-flex w-fit items-center gap-2 rounded-2xl bg-white px-4 py-3 font-bold text-slate-600 shadow-sm">
                ← Kembali
            </a>

            <div class="flex gap-2">
                <a href="{{ route('admin.students.edit', $student) }}"
                   class="inline-flex items-center gap-2 rounded-2xl bg-yellow-400 px-5 py-3 font-black text-yellow-950">
                    ✏️ Edit
                </a>

                <form action="{{ route('admin.students.destroy', $student) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus data santri ini?')">
                    @csrf
                    @method('DELETE')

                    <button class="inline-flex items-center gap-2 rounded-2xl bg-red-500 px-5 py-3 font-black text-white">
                        🗑️ Hapus
                    </button>
                </form>
            </div>
        </div>

        <article class="overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-200/70">
            <div class="relative bg-gradient-to-br from-emerald-600 via-green-500 to-cyan-500 p-8 sm:p-10 text-white">
                <div class="absolute right-8 bottom-4 text-8xl opacity-20">👨‍🎓</div>

                <div class="relative z-10 flex flex-col gap-6 sm:flex-row sm:items-center">
                    @if($student->photo)
                        <img src="{{ asset('storage/' . $student->photo) }}"
                             class="h-32 w-32 rounded-[2rem] object-cover ring-4 ring-white/30">
                    @else
                        <div class="flex h-32 w-32 items-center justify-center rounded-[2rem] bg-white/20 text-6xl ring-4 ring-white/30">
                            👨‍🎓
                        </div>
                    @endif

                    <div>
                        <span class="rounded-full bg-white/20 px-3 py-1 text-xs font-black">
                            {{ ucfirst($student->status) }}
                        </span>

                        <h1 class="mt-4 text-3xl sm:text-5xl font-black">
                            {{ $student->name }}
                        </h1>

                        <p class="mt-2 text-white/85 font-bold">
                            NIS: {{ $student->nis }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="grid gap-5 p-6 sm:p-8 md:grid-cols-2 xl:grid-cols-3">
                @php
                    $items = [
                        ['label' => 'Jenis Kelamin', 'value' => $student->gender === 'male' ? 'Putra' : 'Putri', 'icon' => '👤'],
                        ['label' => 'Tempat Lahir', 'value' => $student->birth_place ?: '-', 'icon' => '📍'],
                        ['label' => 'Tanggal Lahir', 'value' => $student->birth_date ? $student->birth_date->format('d M Y') : '-', 'icon' => '🎂'],
                        ['label' => 'Kelas', 'value' => $student->class_name ?: '-', 'icon' => '🏫'],
                        ['label' => 'Asrama', 'value' => $student->dormitory ?: '-', 'icon' => '🏠'],
                        ['label' => 'Wali Santri', 'value' => $student->guardian_name ?: '-', 'icon' => '👨‍👩‍👧'],
                        ['label' => 'HP Wali', 'value' => $student->guardian_phone ?: '-', 'icon' => '📱'],
                        ['label' => 'Alamat', 'value' => $student->address ?: '-', 'icon' => '🗺️'],
                    ];
                @endphp

                @foreach($items as $item)
                    <div class="rounded-3xl bg-slate-50 p-5">
                        <div class="text-2xl">{{ $item['icon'] }}</div>
                        <p class="mt-3 text-sm font-bold text-slate-500">{{ $item['label'] }}</p>
                        <p class="mt-1 font-black text-slate-900">{{ $item['value'] }}</p>
                    </div>
                @endforeach
            </div>
        </article>
    </div>
</x-admin-layout>