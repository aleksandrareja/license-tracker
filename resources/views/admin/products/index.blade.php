<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            Lista produktów
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('admin.products.create') }}"
                    class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded m-6">
                        Dodaj nowy produkt
                    </a>

            </div>
        </div>

    <div class="py-12 max-w-7xl mx-auto">
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700">
                        <th class="p-2 border">ID</th>
                        <th class="p-2 border">Nazwa</th>
                        <th class="p-2 border">Opis</th>
                        <th class="p-2 border">Wersja</th>
                        <th class="p-2 border">Cena</th>
                        <th class="p-2 border">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="p-2 border">{{ $product->id }}</td>
                            <td class="p-2 border">{{ $product->name }}</td>
                            <td class="p-2 border">{{ $product->description }}</td>
                            <td class="p-2 border">{{ $product->version }}</td>
                            <td class="p-2 border">{{ $product->price }}</td>
                            <td class="p-2 border">
                                <!-- Edytuj, Usuń -->
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="text-blue-600 hover:underline">Edytuj</a>
                                |
                                <form action="{{ route('admin.products.delete', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Czy na pewno chcesz usunąć ten produkt?')">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
