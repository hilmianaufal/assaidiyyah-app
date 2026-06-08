@extends('layouts.public')

@section('content')

<section class="bg-gradient-to-br from-yellow-500 via-orange-500 to-red-500 px-4 pb-20 pt-32 text-white">

    <div class="mx-auto max-w-7xl text-center">

        <div class="inline-flex rounded-full bg-white/20 px-4 py-2 text-sm font-black">
            🏆 PRESTASI SANTRI
        </div>

        <h1 class="mt-6 text-4xl font-black sm:text-6xl">
            Prestasi Assaidiyyah
        </h1>

        <p class="mx-auto mt-5 max-w-3xl text-lg leading-relaxed text-orange-50">
            Berbagai pencapaian membanggakan santri Pondok Pesantren Assaidiyyah di tingkat daerah, nasional, maupun internasional.
        </p>

    </div>

</section>

<section class="bg-slate-50 px-4 py-20">

    <div class="mx-auto max-w-7xl">

        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">

            @forelse($achievements as $achievement)

                <article class="overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-200/70 transition hover:-translate-y-1 hover:shadow-2xl">

                    <div class="relative h-64 bg-gradient-to-br from-yellow-100 to-orange-100">

                        @if($achievement->image)

                            <img
                                src="{{ asset('storage/'.$achievement->image) }}"
                                class="h-full w-full object-cover">

                        @else

                            <div class="flex h-full items-center justify-center text-8xl">
                                🏆
                            </div>

                        @endif

                        @if($achievement->level)

                            <div class="absolute left-4 top-4 rounded-full bg-white px-4 py-2 text-xs font-black text-orange-700 shadow-lg">
                                {{ $achievement->level }}
                            </div>

                        @endif

                    </div>

                    <div class="p-6">

                        <h2 class="text-2xl font-black text-slate-900">
                            {{ $achievement->title }}
                        </h2>

                        @if($achievement->student_name)

                            <div class="mt-3 font-bold text-orange-600">
                                👨‍🎓 {{ $achievement->student_name }}
                            </div>

                        @endif

                        @if($achievement->category)

                            <div class="mt-3 inline-flex rounded-full bg-orange-50 px-3 py-1 text-xs font-black text-orange-700">
                                {{ $achievement->category }}
                            </div>

                        @endif

                        <p class="mt-4 line-clamp-4 leading-relaxed text-slate-500">
                            {{ $achievement->description }}
                        </p>

                        @if($achievement->achievement_date)

                            <div class="mt-5 text-sm font-bold text-slate-400">
                                📅 {{ $achievement->achievement_date->format('d M Y') }}
                            </div>

                        @endif

                    </div>

                </article>

            @empty

                <div class="col-span-full rounded-[2rem] bg-white p-12 text-center shadow-xl">

                    <div class="text-7xl">
                        🏆
                    </div>

                    <h3 class="mt-4 text-2xl font-black text-slate-900">
                        Belum Ada Prestasi
                    </h3>

                    <p class="mt-2 text-slate-500">
                        Prestasi santri akan tampil di sini.
                    </p>

                </div>

            @endforelse

        </div>

        <div class="mt-12">
            {{ $achievements->links() }}
        </div>

    </div>

</section>

@include('public.partials.cta')

@include('public.partials.footer')

@endsection