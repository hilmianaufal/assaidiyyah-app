<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ $setting?->site_name ?? 'Assaidiyyah' }}
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="overflow-x-hidden bg-slate-950">

    @include('public.components.navbar')

    @yield('content')

</body>
</html>