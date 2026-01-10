<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            Lista licencji
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('admin.licenses.add') }}"
                    class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded m-6">
                        Dodaj nową licencję
                    </a>

            </div>
        </div>

    <div class="py-12 max-w-7xl mx-auto">
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700">
                        <th class="p-2 border">ID</th>
                        <th class="p-2 border">Nazwa Produktu</th>
                        <th class="p-2 border">Wersja Produktu</th>
                        <th class="p-2 border">Klucz licencji</th>
                        <th class="p-2 border">Maksymalna liczba użytkowników</th>
                        <th class="p-2 border">Liczba użytkowników</th>
                        <th class="p-2 border">Data wygaśnięcia</th>
                        <th class="p-2 border">Status</th>
                        <th class="p-2 border">Cena</th>
                        <th class="p-2 border">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($licenses as $license)
                        <tr>
                            <td class="p-2 border">{{ $license->id }}</td>
                            <td class="p-2 border">{{ $license->product->name }}</td>
                            <td class="p-2 border">{{ $license->product->version }}</td>
                            <td class="p-2 border">{{ $license->key }}</td>
                            <td class="p-2 border">{{ $license->max_users }}</td>
                            <td class="p-2 border">{{ $license->countCurrentUsers() }}</td>
                            <td class="p-2 border">{{ $license->expiration_date }}</td>
                            <td class="p-2 border">{{ $license->status }}</td>
                            <td class="p-2 border">{{ $license->price }}</td>
                            <td class="p-2 border">
                                <!-- Edytuj, Usuń -->
                                <a href="{{ route('admin.licenses.edit', $license->id) }}" class="text-blue-600 hover:underline">Edytuj</a>
                                |
                                <a href="{{ route('admin.licenses.users', $license->id) }}" class="text-blue-600 hover:underline">Użytkownicy</a>
                                |
                                <form action="{{ route('admin.licenses.delete', $license->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Czy na pewno chcesz usunąć tę licencję?')">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
