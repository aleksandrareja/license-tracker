<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            Lista użytkowników licencji: {{ $license->product->name }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto">
        <div class="bg-white dark:bg-gray-800 sp-6 rounded shadow">
            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700">
                        <th class="p-2 border">ID</th>
                        <th class="p-2 border">Imię</th>
                        <th class="p-2 border">Email</th>
                        <th class="p-2 border">Rola</th>
                        <th class="p-2 border">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="p-2 border">{{ $user->id }}</td>
                            <td class="p-2 border">{{ $user->name }}</td>
                            <td class="p-2 border">{{ $user->email }}</td>
                            <td class="p-2 border">{{ $user->role }}</td>
                            <td class="p-2 border">
                                <!--  Usuń -->                                
                                <form action="{{ route('admin.licenses.remove_user', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Czy na pewno chcesz usunąć tego użytkownika?')">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-xl mb-4">Dodaj użytkownika do licencji</h2>
                    <form action="{{ route('admin.licenses.add_user', $license->id) }}" method="POST">
                        @csrf
                        <div>
                            <label for="user_id">Wybierz użytkownika:</label>
                            <select id="user_id" name="user_id" required>
                                <option value="">-- Wybierz użytkownika --</option>
                                @foreach($other_users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                                Dodaj użytkownika
                            </button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</x-app-layout>
