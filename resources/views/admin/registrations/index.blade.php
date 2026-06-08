<x-admin-layout>
    <div class="space-y-6">

        <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-indigo-600 via-blue-600 to-cyan-500 p-6 sm:p-8 text-white shadow-2xl shadow-blue-200">
            <div class="absolute right-8 bottom-4 text-7xl opacity-20">📝</div>

            <div class="relative z-10">
                <div class="inline-flex items-center gap-2 rounded-full bg-white/20 px-4 py-2 text-sm font-bold">
                    ✨ Penerimaan Santri Baru
                </div>

                <h1 class="mt-5 text-3xl sm:text-4xl font-black">
                    Data PPDB
                </h1>

                <p class="mt-2 max-w-xl text-white/90">
                    Kelola data pendaftar santri baru Pondok Pesantren Assaidiyyah.
                </p>
            </div>
        </div>

        @if(session('success'))
            <div class="rounded-3xl border border-emerald-100 bg-emerald-50 p-4 text-sm font-bold text-emerald-700">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-5">
            @forelse($registrations as $registration)
                <div class="rounded-[2rem] bg-white p-5 shadow-xl shadow-slate-200/70 border border-white">
                    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

                        <div class="flex gap-4">
                            <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-3xl bg-indigo-50 text-3xl">
                                📝
                            </div>

                            <div>
                                <h2 class="text-xl font-black text-slate-900">
                                    {{ $registration->student_name }}
                                </h2>

                                <p class="mt-1 text-sm font-bold text-slate-500">
                                    No. Daftar: {{ $registration->registration_number }}
                                </p>

                                <div class="mt-3 flex flex-wrap gap-2 text-xs font-bold">
                                    <span class="rounded-full bg-blue-50 px-3 py-1.5 text-blue-600">
                                        👤 {{ $registration->gender === 'male' ? 'Putra' : 'Putri' }}
                                    </span>

                                    <span class="rounded-full bg-cyan-50 px-3 py-1.5 text-cyan-600">
                                        📚 {{ $registration->program_choice ?: 'Program belum dipilih' }}
                                    </span>

                                    <span class="rounded-full bg-slate-100 px-3 py-1.5 text-slate-600">
                                        📱 {{ $registration->guardian_phone }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <span class="rounded-full px-3 py-1 text-xs font-black
                                @if($registration->status === 'pending') bg-yellow-50 text-yellow-600
                                @elseif($registration->status === 'verified') bg-blue-50 text-blue-600
                                @elseif($registration->status === 'accepted') bg-emerald-50 text-emerald-600
                                @else bg-red-50 text-red-600
                                @endif">
                                {{ ucfirst($registration->status) }}
                            </span>

                            <a href="{{ route('admin.registrations.show', $registration) }}"
                               class="flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-50 text-lg">
                                👁️
                            </a>

                            <a href="{{ route('admin.registrations.edit', $registration) }}"
                               class="flex h-11 w-11 items-center justify-center rounded-2xl bg-yellow-50 text-lg">
                                ✏️
                            </a>

                            <form action="{{ route('admin.registrations.destroy', $registration) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus data pendaftar ini?')">
                                @csrf
                                @method('DELETE')

                                <button class="flex h-11 w-11 items-center justify-center rounded-2xl bg-red-50 text-lg">
                                    🗑️
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            @empty
                <div class="rounded-[2rem] bg-white p-10 text-center shadow-xl shadow-slate-200/70">
                    <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-[2rem] bg-indigo-50 text-5xl">
                        📝
                    </div>

                    <h3 class="mt-5 text-2xl font-black">
                        Belum ada pendaftar
                    </h3>

                    <p class="mt-2 text-slate-500">
                        Data pendaftar akan muncul setelah calon santri mengisi formulir PPDB.
                    </p>
                </div>
            @endforelse
        </div>

        <div>
            {{ $registrations->links() }}
        </div>

    </div>
</x-admin-layout>