@extends('layouts.public')

@section('content')

<section class="bg-gradient-to-br from-blue-950 via-blue-800 to-cyan-700 px-4 pb-20 pt-32 text-white">
    <div class="mx-auto max-w-7xl text-center">
        <div class="inline-flex rounded-full bg-white/10 px-4 py-2 text-sm font-black">
            📚 PROGRAM PONDOK
        </div>

        <h1 class="mt-6 text-4xl font-black sm:text-6xl">
            Program Unggulan Assaidiyyah
        </h1>

        <p class="mx-auto mt-5 max-w-3xl text-lg leading-relaxed text-blue-50">
            Pilihan program pendidikan untuk membentuk santri yang Qurani, berakhlak, berilmu, dan mandiri.
        </p>
    </div>
</section>

<section class="bg-slate-50 px-4 py-20 text-slate-900">
    <div class="mx-auto max-w-7xl">

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse($programs as $program)
                <article class="overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-200/70">
                    <div class="h-56 bg-gradient-to-br from-blue-100 to-cyan-100">
                        @if($program->image)
                            <img src="{{ asset('storage/' . $program->image) }}"
                                 class="h-full w-full object-cover">
                        @else
                            <div class="flex h-full items-center justify-center text-7xl">
                                {{ $program->icon ?: '📚' }}
                            </div>
                        @endif
                    </div>

                    <div class="p-6">
                        <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-50 text-3xl">
                            {{ $program->icon ?: '📚' }}
                        </div>

                        <h2 class="text-2xl font-black">
                            {{ $program->title }}
                        </h2>

                        <p class="mt-4 line-clamp-4 leading-relaxed text-slate-500">
                            {{ $program->description }}
                        </p>
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-[2rem] bg-white p-12 text-center shadow-xl">
                    <div class="text-7xl">📚</div>
                    <h3 class="mt-4 text-2xl font-black">Belum Ada Program</h3>
                    <p class="mt-2 text-slate-500">Program pondok akan tampil di sini.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $programs->links() }}
        </div>

    </div>
</section>

@include('public.partials.cta')
@include('public.partials.footer')

@endsection