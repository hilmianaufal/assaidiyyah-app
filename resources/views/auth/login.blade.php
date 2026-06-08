<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-xl font-bold text-gray-900">
            Masuk Admin
        </h2>
        <p class="mt-1 text-sm text-gray-500">
            Silakan login untuk mengelola website pesantren.
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input 
                id="email" 
                class="block mt-2 w-full rounded-2xl border-gray-200 bg-gray-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
                autofocus 
                autocomplete="username" 
                placeholder="admin@assaidiyyah.test"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" value="Password" />
            <x-text-input 
                id="password" 
                class="block mt-2 w-full rounded-2xl border-gray-200 bg-gray-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500"
                type="password"
                name="password"
                required 
                autocomplete="current-password"
                placeholder="Masukkan password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between">
            <label for="remember_me" class="flex items-center gap-2">
                <input 
                    id="remember_me" 
                    type="checkbox" 
                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" 
                    name="remember"
                >
                <span class="text-sm text-gray-600">Ingat saya</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm font-semibold text-blue-600 hover:text-blue-700" href="{{ route('password.request') }}">
                    Lupa password?
                </a>
            @endif
        </div>

        <button 
            type="submit"
            class="w-full rounded-2xl bg-gradient-to-r from-blue-600 to-blue-700 px-5 py-3.5 text-white font-semibold shadow-lg shadow-blue-200 hover:from-blue-700 hover:to-blue-800 transition"
        >
            Masuk Dashboard
        </button>
    </form>
</x-guest-layout>