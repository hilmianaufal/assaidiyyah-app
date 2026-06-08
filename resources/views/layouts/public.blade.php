<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @php
        $siteName = $setting?->site_name ?? 'Pondok Pesantren Assaidiyyah';
        $title = $metaTitle ?? $setting?->meta_title ?? $siteName;
        $description = $metaDescription ?? $setting?->meta_description ?? $setting?->tagline ?? 'Website resmi Pondok Pesantren Assaidiyyah.';
        $keywords = $metaKeywords ?? $setting?->meta_keywords ?? 'pondok pesantren, assaidiyyah, ppdb, santri, tahfidz';
        $image = $metaImage ?? ($setting?->og_image ? asset('storage/' . $setting->og_image) : null);
        $url = url()->current();
    @endphp

    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">
    <meta name="keywords" content="{{ $keywords }}">
    <link rel="canonical" href="{{ $url }}">

    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:url" content="{{ $url }}">
    <meta property="og:site_name" content="{{ $siteName }}">
    @if($image)
        <meta property="og:image" content="{{ $image }}">
    @endif

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title }}">
    <meta name="twitter:description" content="{{ $description }}">
    @if($image)
        <meta name="twitter:image" content="{{ $image }}">
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-slate-50">

    @include('public.partials.navbar')

    @yield('content')
    @include('public.partials.mobile-nav')
    @stack('scripts')

</body>
</html>