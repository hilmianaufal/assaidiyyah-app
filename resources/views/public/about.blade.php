@extends('layouts.public')

@section('content')

<section class="bg-gradient-to-br from-blue-950 via-blue-800 to-cyan-700 px-4 pb-20 pt-32 text-white">
    <div class="mx-auto max-w-7xl text-center">
        <div class="inline-flex rounded-full bg-white/10 px-4 py-2 text-sm font-black">
            🕌 PROFIL PONDOK
        </div>

        <h1 class="mt-6 text-4xl font-black sm:text-6xl">
            Tentang {{ $setting?->site_name ?? 'Pondok Pesantren Assaidiyyah' }}
        </h1>

        <p class="mx-auto mt-5 max-w-3xl text-lg leading-relaxed text-blue-50">
            {{ $setting?->tagline ?? 'Membentuk generasi Qurani, berakhlak mulia, berilmu, dan mandiri.' }}
        </p>
    </div>
</section>

<section class="bg-white px-4 py-20 text-slate-900">
    <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-2 lg:items-center">
        <div>
            <div class="inline-flex rounded-full bg-blue-100 px-4 py-2 text-sm font-black text-blue-700">
                📖 Tentang Kami
            </div>

            <h2 class="mt-5 text-4xl font-black">
                Pesantren Modern dengan Nilai Tradisi Islami
            </h2>

            <p class="mt-5 leading-relaxed text-slate-600">
                {{ $setting?->description ?? 'Pondok Pesantren Assaidiyyah merupakan lembaga pendidikan Islam yang berfokus pada pembentukan akhlak, ilmu agama, hafalan Al-Qur’an, kemandirian, dan karakter santri.' }}
            </p>
        </div>

        <div class="rounded-[2rem] bg-gradient-to-br from-blue-100 to-cyan-100 p-6 text-center">
            @if($setting?->hero_image)
                <img src="{{ asset('storage/' . $setting->hero_image) }}"
                     class="h-80 w-full rounded-[1.5rem] object-cover">
            @else
                <div class="flex h-80 items-center justify-center text-8xl">
                    🕌
                </div>
            @endif
        </div>
    </div>
</section>

<section class="bg-slate-50 px-4 py-20 text-slate-900">
    <div class="mx-auto grid max-w-7xl gap-6 lg:grid-cols-2">
        <div class="rounded-[2rem] bg-white p-8 shadow-xl">
            <div class="text-5xl">🎯</div>
            <h2 class="mt-5 text-3xl font-black">Visi</h2>
            <p class="mt-4 leading-relaxed text-slate-600">
                {{ $setting?->vision ?? 'Menjadi pondok pesantren unggulan dalam mencetak generasi Qurani, berakhlak mulia, berilmu, dan bermanfaat bagi umat.' }}
            </p>
        </div>

        <div class="rounded-[2rem] bg-white p-8 shadow-xl">
            <div class="text-5xl">🚀</div>
            <h2 class="mt-5 text-3xl font-black">Misi</h2>
            <p class="mt-4 leading-relaxed text-slate-600">
                {!! nl2br(e($setting?->mission ?? 'Menyelenggarakan pendidikan Islam terpadu, membina akhlak santri, mengembangkan potensi akademik dan non-akademik, serta menanamkan kemandirian.')) !!}
            </p>
        </div>
    </div>
</section>

<section class="bg-white px-4 py-20 text-slate-900">
    <div class="mx-auto max-w-7xl">
        <div class="text-center">
            <div class="inline-flex rounded-full bg-cyan-100 px-4 py-2 text-sm font-black text-cyan-700">
                🏢 STRUKTUR ORGANISASI
            </div>

            <h2 class="mt-5 text-4xl font-black">
                Pengurus Pondok
            </h2>
        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @forelse($organizations as $organization)
                <div class="rounded-[2rem] bg-slate-50 p-6 text-center shadow-xl">
                    @if($organization->photo)
                        <img src="{{ asset('storage/' . $organization->photo) }}"
                             class="mx-auto h-24 w-24 rounded-3xl object-cover">
                    @else
                        <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-3xl bg-blue-100 text-5xl">
                            🏢
                        </div>
                    @endif

                    <h3 class="mt-5 font-black">{{ $organization->name }}</h3>
                    <p class="mt-1 text-sm font-bold text-blue-600">{{ $organization->position }}</p>
                </div>
            @empty
                <div class="col-span-full text-center text-slate-500">
                    Belum ada data struktur organisasi.
                </div>
            @endforelse
        </div>
    </div>
</section>

<section class="bg-slate-950 px-4 py-20 text-white">
    <div class="mx-auto max-w-7xl">
        <div class="text-center">
            <div class="inline-flex rounded-full bg-white/10 px-4 py-2 text-sm font-black text-cyan-300">
                👳 DEWAN ASATIDZ
            </div>

            <h2 class="mt-5 text-4xl font-black">
                Ustadz & Pengajar
            </h2>
        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @forelse($teachers as $teacher)
                <div class="rounded-[2rem] bg-white/10 p-6 text-center backdrop-blur">
                    @if($teacher->photo)
                        <img src="{{ asset('storage/' . $teacher->photo) }}"
                             class="mx-auto h-24 w-24 rounded-3xl object-cover">
                    @else
                        <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-3xl bg-white/10 text-5xl">
                            👳
                        </div>
                    @endif

                    <h3 class="mt-5 font-black">{{ $teacher->name }}</h3>
                    <p class="mt-1 text-sm font-bold text-cyan-300">{{ $teacher->position }}</p>
                </div>
            @empty
                <div class="col-span-full text-center text-slate-400">
                    Belum ada data ustadz.
                </div>
            @endforelse
        </div>
    </div>
</section>

@include('public.partials.cta')
@include('public.partials.footer')

@endsection