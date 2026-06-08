<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Assaidiyyah') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-100">
    <div class="min-h-screen flex items-center justify-center px-4 py-8">

        <div class="w-full max-w-md">
            <div class="text-center mb-8">
                <div class="mx-auto w-20 h-20 rounded-3xl bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center shadow-xl shadow-blue-200">
                    <span class="text-white text-3xl font-extrabold">A</span>
                </div>

                <h1 class="mt-5 text-2xl font-bold text-gray-900">
                    Pondok Pesantren Assaidiyyah
                </h1>

                <p class="mt-2 text-sm text-gray-500">
                    Sistem Informasi & Admin Panel
                </p>
            </div>

            <div class="bg-white/90 backdrop-blur-xl rounded-[2rem] shadow-2xl shadow-blue-100 border border-blue-100 p-6">
                {{ $slot }}
            </div>

            <p class="text-center mt-6 text-xs text-gray-400">
                © {{ date('Y') }} Pondok Pesantren Assaidiyyah
            </p>
        </div>

    </div>
</body>
</html>