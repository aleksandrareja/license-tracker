<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Hasło')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between text-sm mt-4">
            <label for="remember_me" class="inline-flex items-center gap-2 text-gray-300">
                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="rounded bg-white/10 border-white/20
                           text-indigo-500 focus:ring-indigo-500"
                >
                Zapamiętaj mnie
            </label>

            @if (Route::has('password.request'))
                <a
                    href="{{ route('password.request') }}"
                    class="text-indigo-300 hover:text-indigo-400 transition"
                >
                    Zapomniałeś hasła?
                </a>
            @endif
        </div>

        <!-- Button -->
        <div class="pt-4">
            <x-primary-button
                class="w-full justify-center rounded-xl py-3 text-lg
                       bg-indigo-600 hover:bg-indigo-700
                       shadow-[0_0_7px_rgba(99,102,241,0.6)]
                       transition">
                Zaloguj się
            </x-primary-button>
        </div>

        <!-- Register -->
        @if (Route::has('register'))
            <div class="text-center text-sm text-gray-300 mt-4">
                Nie masz konta?
                <a
                    href="{{ route('register') }}"
                    class="text-indigo-400 hover:text-indigo-300 transition"
                >
                    Zarejestruj się
                </a>
            </div>
        @endif
    </form>
</x-guest-layout>
