<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            Lista użytkowników
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto">
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
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
                                <!-- Edytuj, Usuń -->
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-600 hover:underline">Edytuj</a>
                                |
                                <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display:inline;">
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
</x-app-layout>
