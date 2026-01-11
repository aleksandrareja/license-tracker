<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel administratora') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Witaj w panelu administratora!") }}
                </div>
            </div>

            <div class="mt-6 p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h2>Statystyki</h2>
            </div>

            <div class="mt-6 p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h2>Aktualne licencje</h2>
                <a href="{{ route('user.licenses') }}"
                    class="inline-block bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">
                        Zobacz moje licencje
                    </a>
            </div>

            <div class="mt-6 p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('admin.users') }}"
                    class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Zarządzaj użytkownikami
                    </a>

                <a href="{{ route('admin.products') }}"
                    class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                        Zarządzaj produktami
                    </a>
                <a href="{{ route('admin.licenses') }}"
                    class="inline-block bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded">
                        Zarządzaj licencjami
                    </a>
            </div>
        </div>
    </div>
</x-app-layout>