<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">
            Edytuj użytkownika
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto px-4">
        <div class="bg-white/5 backdrop-blur-xl
                    rounded-2xl p-8
                    border border-white/10">

            <p class="text-gray-100 mb-6">
                Formularz edycji danych użytkownika
            </p>

            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm text-gray-400 mb-1">
                        Imię
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ $user->name }}"
                        required
                        class="w-full bg-white/10 text-white
                               border border-white/10
                               rounded-lg px-4 py-2
                               focus:outline-none focus:ring-2
                               focus:ring-indigo-500">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm text-gray-400 mb-1">
                        Email
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ $user->email }}"
                        required
                        class="w-full bg-white/10 text-white
                               border border-white/10
                               rounded-lg px-4 py-2
                               focus:outline-none focus:ring-2
                               focus:ring-indigo-500">
                </div>

                <!-- Role -->
                <div>
                    <label for="role" class="block text-sm text-gray-400 mb-1">
                        Rola
                    </label>
                    <select
                        id="role"
                        name="role"
                        required
                        class="w-full bg-white/10 text-white
                               border border-white/10
                               rounded-lg px-4 py-2
                               focus:outline-none focus:ring-2
                               focus:ring-indigo-500">

                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>
                            User
                        </option>
                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>
                    </select>
                </div>

                <!-- Actions -->
                <div class="flex justify-end gap-4 pt-4 items-center">
                    <a href="{{ route('admin.users') }}"
                       class="text-gray-400 hover:text-gray-300 transition">
                        Anuluj
                    </a>

                    <button
                        type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700
                               text-white font-medium
                               px-6 py-2 rounded-lg
                               shadow-[0_0_7px_rgba(99,102,241,0.6)]
                               transition">
                        Zapisz zmiany
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
