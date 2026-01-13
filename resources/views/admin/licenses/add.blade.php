<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">
            Dodaj nową licencję
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto px-4">
        <div class="bg-white/5 p-8 rounded-2xl border border-white/10">

            <form action="{{ route('admin.licenses.add') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Produkt -->
                <div>
                    <label for="product_id" class="block text-sm text-gray-400 mb-1">Produkt</label>
                    <select id="product_id" name="product_id" required
                            class="w-full bg-white/10 text-gray-400 border border-white/10 rounded-lg px-4 py-2
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">Wybierz produkt</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Klucz licencji -->
                <div>
                    <label for="key" class="block text-sm text-gray-400 mb-1">Klucz licencji</label>
                    <textarea id="key" name="key" required
                              class="w-full bg-white/10 text-white border border-white/10 rounded-lg px-4 py-2
                                     focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-none h-24"></textarea>
                </div>

                <!-- Maksymalna liczba użytkowników -->
                <div>
                    <label for="max_users" class="block text-sm text-gray-400 mb-1">Maksymalna liczba użytkowników</label>
                    <input type="number" id="max_users" name="max_users" required
                           class="w-full bg-white/10 text-white border border-white/10 rounded-lg px-4 py-2
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Data wygaśnięcia -->
                <div>
                    <label for="expiration_date" class="block text-sm text-gray-400 mb-1">Data wygaśnięcia</label>
                    <input type="date" id="expiration_date" name="expiration_date" required
                           class="w-full bg-white/10 text-white border border-white/10 rounded-lg px-4 py-2
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm text-gray-400 mb-1">Status</label>
                    <select id="status" name="status" required
                            class="w-full bg-white/10 text-gray-400 border border-white/10 rounded-lg px-4 py-2
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="active">Aktywna</option>
                        <option value="expired">Wygasła</option>
                        <option value="suspended">Zawieszona</option>
                    </select>
                </div>

                <!-- Cena -->
                <div>
                    <label for="price" class="block text-sm text-gray-400 mb-1">Cena (PLN)</label>
                    <input type="number" id="price" name="price" step="0.01" required
                           class="w-full bg-white/10 text-white border border-white/10 rounded-lg px-4 py-2
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Submit -->
                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white font-medium px-6 py-2 rounded-lg
                                   shadow-[0_0_7px_rgba(34,197,94,0.5)] transition">
                        Dodaj licencję
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
