<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">
            Lista użytkowników
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto">
        <div class="bg-white/5 p-6 rounded-2xl border border-white/10">

        <div class="space-y-4 md:hidden">
                @foreach($users as $user)
                    <div class="bg-white/5 rounded-xl p-4
                                border border-white/10">

                        <div class="flex justify-between">
                            <span class="text-gray-400 text-sm">ID</span>
                            <span class="text-white font-medium">{{ $user->id }}</span>
                        </div>

                        <div class="flex justify-between mt-2">
                            <span class="text-gray-400 text-sm">Imię</span>
                            <span class="text-white">{{ $user->name }}</span>
                        </div>

                        <div class="flex justify-between mt-2">
                            <span class="text-gray-400 text-sm">Email</span>
                            <span class="text-gray-300 text-sm">{{ $user->email }}</span>
                        </div>

                        <div class="flex justify-between mt-2">
                            <span class="text-gray-400 text-sm">Rola</span>
                            <span class="text-indigo-400 font-semibold">{{ $user->role }}</span>
                        </div>

                        <div class="flex justify-end gap-4 mt-4 text-sm">
                            <a href="{{ route('admin.users.edit', $user->id) }}"
                            class="text-indigo-400 hover:text-indigo-300">
                                Edytuj
                            </a>

                            <form action="{{ route('admin.users.delete', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-400 hover:text-red-300"
                                        onclick="return confirm('Usunąć użytkownika?')">
                                    Usuń
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <table class="w-full text-gray-200 max-md:hidden">
                <thead class="bg-white/10 text-gray-300">
                    <tr>
                        <th class="p-2">ID</th>
                        <th class="p-2">Imię</th>
                        <th class="p-2">Email</th>
                        <th class="p-2">Rola</th>
                        <th class="p-2">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="border-t border-white/5">
                            <td class="p-2 text-center">{{ $user->id }}</td>
                            <td class="p-2 text-center">{{ $user->name }}</td>
                            <td class="p-2 text-center text-gray-400">{{ $user->email }}</td>
                            <td class="p-2 text-center text-indigo-400">{{ $user->role }}</td>
                            <td class="p-2 text-right space-x-3">
                                <!-- Edytuj, Usuń -->
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="text-indigo-400 hover:text-indigo-300 inline">Edytuj</a>
                                <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300" onclick="return confirm('Czy na pewno chcesz usunąć tego użytkownika?')">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
