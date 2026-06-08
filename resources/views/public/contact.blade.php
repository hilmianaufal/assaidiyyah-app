@extends('layouts.public')

@section('content')

<section class="bg-gradient-to-br from-blue-950 via-blue-800 to-cyan-700 px-4 pb-20 pt-32 text-white">
    <div class="mx-auto max-w-7xl text-center">
        <div class="inline-flex rounded-full bg-white/10 px-4 py-2 text-sm font-black">
            📞 KONTAK KAMI
        </div>

        <h1 class="mt-6 text-4xl font-black sm:text-6xl">
            Hubungi Pondok Pesantren Assaidiyyah
        </h1>

        <p class="mx-auto mt-5 max-w-3xl text-lg leading-relaxed text-blue-50">
            Silakan hubungi kami untuk informasi PPDB, program pondok, kunjungan, atau kerja sama.
        </p>
    </div>
</section>

<section class="bg-slate-50 px-4 py-20 text-slate-900">
    <div class="mx-auto grid max-w-7xl gap-8 lg:grid-cols-3">

        <div class="space-y-5 lg:col-span-1">
            <div class="rounded-[2rem] bg-white p-6 shadow-xl">
                <div class="text-4xl">📍</div>
                <h3 class="mt-4 text-xl font-black">Alamat</h3>
                <p class="mt-2 text-slate-500">
                    {{ $setting?->address ?? 'Alamat pondok belum diisi.' }}
                </p>
            </div>

            <div class="rounded-[2rem] bg-white p-6 shadow-xl">
                <div class="text-4xl">📱</div>
                <h3 class="mt-4 text-xl font-black">WhatsApp</h3>
                <p class="mt-2 text-slate-500">
                    {{ $setting?->phone ?? 'Nomor belum diisi.' }}
                </p>
            </div>

            <div class="rounded-[2rem] bg-white p-6 shadow-xl">
                <div class="text-4xl">📧</div>
                <h3 class="mt-4 text-xl font-black">Email</h3>
                <p class="mt-2 text-slate-500">
                    {{ $setting?->email ?? 'Email belum diisi.' }}
                </p>
            </div>
        </div>

        <div class="overflow-hidden rounded-[2rem] bg-white p-4 shadow-xl lg:col-span-2">
            <iframe
                class="h-[520px] w-full rounded-[1.5rem]"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps?q={{ urlencode($setting?->address ?? 'Indonesia') }}&output=embed">
            </iframe>
        </div>

    </div>
</section>

@if($setting?->phone)
    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->phone) }}"
       target="_blank"
       class="fixed bottom-5 right-5 z-50 flex h-16 w-16 items-center justify-center rounded-full bg-emerald-500 text-3xl text-white shadow-2xl">
        💬
    </a>
@endif

@include('public.partials.footer')

@endsection