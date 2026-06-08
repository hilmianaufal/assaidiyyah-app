@extends('layouts.public')

@section('content')

<section class="bg-gradient-to-br from-blue-950 via-blue-800 to-cyan-700 px-4 pb-20 pt-32 text-white">

    <div class="mx-auto max-w-7xl text-center">

        <div class="inline-flex rounded-full bg-white/10 px-4 py-2 text-sm font-black">
            🖼️ GALERI PONDOK
        </div>

        <h1 class="mt-6 text-4xl font-black sm:text-6xl">
            Dokumentasi Kegiatan Assaidiyyah
        </h1>

        <p class="mx-auto mt-5 max-w-3xl text-lg leading-relaxed text-blue-50">
            Kumpulan foto kegiatan santri, pembelajaran, haflah, perlombaan, kajian, dan aktivitas pondok pesantren.
        </p>

    </div>

</section>

<section class="bg-slate-50 px-4 py-20">

    <div class="mx-auto max-w-7xl">

        <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">

            @forelse($galleries as $gallery)

                <div class="group overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-200/70">

                    <div class="relative overflow-hidden">

                        @if($gallery->image)

                            <img
                                src="{{ asset('storage/'.$gallery->image) }}"
                                alt="{{ $gallery->title }}"
                                class="h-52 w-full object-cover transition duration-500 group-hover:scale-110">

                        @else

                            <div class="flex h-52 items-center justify-center bg-slate-100 text-6xl">
                                🖼️
                            </div>

                        @endif

                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent opacity-0 transition duration-300 group-hover:opacity-100"></div>

                    </div>

                    <div class="p-4">

                        <h3 class="line-clamp-2 font-black text-slate-900">
                            {{ $gallery->title }}
                        </h3>

                        @if(!empty($gallery->category))
                            <p class="mt-2 text-sm font-bold text-blue-600">
                                🏷️ {{ $gallery->category }}
                            </p>
                        @endif

                        @if(!empty($gallery->created_at))
                            <p class="mt-2 text-xs font-semibold text-slate-400">
                                📅 {{ $gallery->created_at->format('d M Y') }}
                            </p>
                        @endif

                    </div>

                </div>

            @empty

                <div class="col-span-full rounded-[2rem] bg-white p-12 text-center shadow-xl">

                    <div class="text-7xl">
                        🖼️
                    </div>

                    <h3 class="mt-4 text-2xl font-black text-slate-900">
                        Belum Ada Galeri
                    </h3>

                    <p class="mt-2 text-slate-500">
                        Dokumentasi kegiatan pondok akan tampil di sini.
                    </p>

                </div>

            @endforelse

        </div>

        <div class="mt-12">
            {{ $galleries->links() }}
        </div>

    </div>

</section>

@include('public.partials.cta')

@include('public.partials.footer')

@endsection