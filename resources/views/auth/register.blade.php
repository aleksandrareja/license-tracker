<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

         <!-- Button -->
        <div class="pt-4 mt-4">
            <x-primary-button
                class="w-full justify-center rounded-xl py-3 text-lg
                       bg-indigo-600 hover:bg-indigo-700
                       shadow-[0_0_7px_rgba(99,102,241,0.6)]
                       transition">
                Zarejestruj się
            </x-primary-button>
        </div>

        <!-- Register -->
        <div class="text-center text-sm text-gray-300 mt-4">
            Masz już konto?
            <a
                href="{{ route('login') }}"
                class="text-indigo-400 hover:text-indigo-300 transition"
            >
                Zaloguj się
            </a>
        </div>

    </form>
</x-guest-layout>
