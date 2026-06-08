<x-admin-layout>
    <div class="space-y-6">

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('admin.registrations.index') }}"
               class="inline-flex w-fit items-center gap-2 rounded-2xl bg-white px-4 py-3 font-bold text-slate-600 shadow-sm">
                ← Kembali
            </a>

            <div class="flex gap-2">
                <a href="{{ route('admin.registrations.edit', $registration) }}"
                   class="inline-flex items-center gap-2 rounded-2xl bg-yellow-400 px-5 py-3 font-black text-yellow-950">
                    ✏️ Edit
                </a>

                <form action="{{ route('admin.registrations.destroy', $registration) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus data pendaftar ini?')">
                    @csrf
                    @method('DELETE')

                    <button class="inline-flex items-center gap-2 rounded-2xl bg-red-500 px-5 py-3 font-black text-white">
                        🗑️ Hapus
                    </button>
                </form>
            </div>
        </div>

        <article class="overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-200/70">

            <div class="relative bg-gradient-to-br from-indigo-600 via-blue-600 to-cyan-500 p-8 sm:p-10 text-white">
                <div class="absolute right-8 bottom-4 text-8xl opacity-20">📝</div>

                <span class="rounded-full bg-white/20 px-3 py-1 text-xs font-black">
                    {{ ucfirst($registration->status) }}
                </span>

                <h1 class="relative z-10 mt-5 max-w-4xl text-3xl sm:text-5xl font-black">
                    {{ $registration->student_name }}
                </h1>

                <p class="relative z-10 mt-3 text-white/85 font-bold">
                    No. Pendaftaran: {{ $registration->registration_number }}
                </p>
            </div>

            <div class="grid gap-5 p-6 sm:p-8 md:grid-cols-2 xl:grid-cols-3">
                @php
                    $items = [
                        ['label' => 'Jenis Kelamin', 'value' => $registration->gender === 'male' ? 'Putra' : 'Putri', 'icon' => '👤'],
                        ['label' => 'Tempat Lahir', 'value' => $registration->birth_place ?: '-', 'icon' => '📍'],
                        ['label' => 'Tanggal Lahir', 'value' => $registration->birth_date ? $registration->birth_date->format('d M Y') : '-', 'icon' => '🎂'],
                        ['label' => 'Asal Sekolah', 'value' => $registration->school_origin ?: '-', 'icon' => '🏫'],
                        ['label' => 'Pilihan Program', 'value' => $registration->program_choice ?: '-', 'icon' => '📚'],
                        ['label' => 'Nama Wali', 'value' => $registration->guardian_name, 'icon' => '👨‍👩‍👧'],
                        ['label' => 'HP Wali', 'value' => $registration->guardian_phone, 'icon' => '📱'],
                        ['label' => 'Alamat', 'value' => $registration->address ?: '-', 'icon' => '🗺️'],
                    ];
                @endphp

                @foreach($items as $item)
                    <div class="rounded-3xl bg-slate-50 p-5">
                        <div class="text-2xl">{{ $item['icon'] }}</div>
                        <p class="mt-3 text-sm font-bold text-slate-500">{{ $item['label'] }}</p>
                        <p class="mt-1 font-black text-slate-900">{{ $item['value'] }}</p>
                    </div>
                @endforeach

                <div class="rounded-3xl bg-indigo-50 p-5 md:col-span-2 xl:col-span-3">
                    <div class="text-2xl">🗒️</div>
                    <p class="mt-3 text-sm font-bold text-indigo-600">Catatan</p>
                    <p class="mt-2 leading-relaxed font-medium text-indigo-900">
                        {!! nl2br(e($registration->notes ?: 'Tidak ada catatan.')) !!}
                    </p>
                </div>
            </div>

        </article>

    </div>
</x-admin-layout>