<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dodaj nowy produkt') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.products.create') }}" method="POST">
                        @csrf
                        <div>
                            <label for="name">Nazwa:</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div>
                            <label for="description">Opis:</label>
                            <textarea id="description" name="description" required></textarea>
                        </div>
                        <div>
                            <label for="version">Wersja:</label>
                            <input type="text" id="version" name="version" required>
                        <div>
                            <label for="price">Cena:</label>
                            <input type="number" id="price" name="price" step="0.01" required>
                        </div>
                        <div>
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                                Dodaj produkt
                            </button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>