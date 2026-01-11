<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">
            Lista licencji
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto px-4">

        <!-- Dodaj licencję -->
        <div class="mb-6 flex justify-end">
            <a href="{{ route('admin.licenses.add') }}"
               class="bg-green-600 hover:bg-green-700
                      text-white font-medium
                      px-5 py-2 rounded-lg
                      shadow-[0_0_7px_rgba(34,197,94,0.5)]
                      transition">
                + Dodaj nową licencję
            </a>
        </div>

        <!-- Licencje -->
        <div class="space-y-4">
            @foreach($licenses as $license)
                <div class="bg-white/5 backdrop-blur-xl
                            rounded-2xl p-4
                            border border-white/10
                            shadow-[0_0_10px_rgba(99,102,241,0.3)]
                            hover:shadow-[0_0_20px_rgba(99,102,241,0.5)]
                            transition flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                    <!-- Dane licencji -->
                    <div class="flex-1 grid grid-cols-2 md:grid-cols-5 gap-4 md:gap-6">
                        <div>
                            <span class="text-gray-400 text-sm">ID</span>
                            <p class="text-white font-medium">{{ $license->id }}</p>
                        </div>
                        <div>
                            <span class="text-gray-400 text-sm">Produkt</span>
                            <p class="text-white">{{ $license->product->name }}</p>
                        </div>
                        <div>
                            <span class="text-gray-400 text-sm">Wersja</span>
                            <p class="text-white">{{ $license->product->version }}</p>
                        </div>
                        <div>
                            <span class="text-gray-400 text-sm">Klucz</span>
                            <p class="text-indigo-400 font-mono text-sm">{{ $license->key }}</p>
                        </div>
                        <div>
                            <span class="text-gray-400 text-sm">Użytkownicy</span>
                            <p class="text-white">{{ $license->countCurrentUsers() }}/{{ $license->max_users }}</p>
                        </div>
                        <div>
                            <span class="text-gray-400 text-sm">Status</span>
                            <p class="text-white">{{ $license->status }}</p>
                        </div>
                        <div>
                            <span class="text-gray-400 text-sm">Data wygaśnięcia</span>
                            <p class="text-white">{{ $license->expiration_date }}</p>
                        </div>
                        <div>
                            <span class="text-gray-400 text-sm">Cena</span>
                            <p class="text-indigo-400 font-semibold">{{ $license->price }} zł</p>
                        </div>
                    </div>

                    <!-- Akcje -->
                    <div class="flex gap-3 md:flex-col md:items-end mt-2 md:mt-0">
                        <a href="{{ route('admin.licenses.edit', $license->id) }}"
                           class="text-indigo-400 hover:text-indigo-300 text-sm transition">
                            Edytuj
                        </a>
                        <a href="{{ route('admin.licenses.users', $license->id) }}"
                           class="text-indigo-400 hover:text-indigo-300 text-sm transition">
                            Użytkownicy
                        </a>
                        <form action="{{ route('admin.licenses.delete', $license->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-red-400 hover:text-red-300 text-sm transition"
                                    onclick="return confirm('Czy na pewno chcesz usunąć tę licencję?')">
                                Usuń
                            </button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
