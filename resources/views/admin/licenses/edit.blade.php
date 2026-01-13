<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">
            Edytuj licencję
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto px-4">
        <div class="bg-white/5
                    rounded-2xl p-8
                    border border-white/10">

            <p class="text-gray-400 mb-6">
                Formularz edycji licencji
            </p>

            <form action="{{ route('admin.licenses.update', $license->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Produkt -->
                <div>
                    <label for="product_id" class="block text-sm text-gray-400 mb-1">
                        Produkt
                    </label>
                    <select id="product_id" name="product_id" required
                            class="w-full bg-white/10 text-white
                                   border border-white/10 rounded-lg px-4 py-2
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ $license->product_id == $product->id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Klucz licencji -->
                <div>
                    <label for="key" class="block text-sm text-gray-400 mb-1">
                        Klucz licencji
                    </label>
                    <textarea id="key" name="key" required
                              class="w-full bg-white/10 text-white
                                     border border-white/10 rounded-lg px-4 py-2
                                     focus:outline-none focus:ring-2 focus:ring-indigo-500
                                     resize-none h-24">{{ $license->key }}</textarea>
                </div>

                <!-- Maksymalna liczba użytkowników -->
                <div>
                    <label for="max_users" class="block text-sm text-gray-400 mb-1">
                        Maksymalna liczba użytkowników
                    </label>
                    <input type="number" id="max_users" name="max_users" value="{{ $license->max_users }}" required
                           class="w-full bg-white/10 text-white
                                  border border-white/10 rounded-lg px-4 py-2
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Data wygaśnięcia -->
                <div>
                    <label for="expiration_date" class="block text-sm text-gray-400 mb-1">
                        Data wygaśnięcia
                    </label>
                    <input type="date" id="expiration_date" name="expiration_date" value="{{ $license->expiration_date }}" required
                           class="w-full bg-white/10 text-white
                                  border border-white/10 rounded-lg px-4 py-2
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm text-gray-400 mb-1">
                        Status
                    </label>
                    <select id="status" name="status" required
                            class="w-full bg-white/10 text-white
                                   border border-white/10 rounded-lg px-4 py-2
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="active" {{ $license->status == 'active' ? 'selected' : '' }}>Aktywna</option>
                        <option value="expired" {{ $license->status == 'expired' ? 'selected' : '' }}>Wygasła</option>
                        <option value="suspended" {{ $license->status == 'suspended' ? 'selected' : '' }}>Zawieszona</option>
                    </select>
                </div>

                <!-- Cena -->
                <div>
                    <label for="price" class="block text-sm text-gray-400 mb-1">
                        Cena (PLN)
                    </label>
                    <input type="number" id="price" name="price" value="{{ $license->price }}" step="0.01" required
                           class="w-full bg-white/10 text-white
                                  border border-white/10 rounded-lg px-4 py-2
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Akcje -->
                <div class="flex justify-end gap-4 items-center">
                    <a href="{{ route('admin.licenses') }}"
                       class="text-gray-400 hover:text-gray-300 transition">
                        Anuluj
                    </a>

                    <button type="submit"
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
