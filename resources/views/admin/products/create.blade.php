<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">
            Dodaj nowy produkt
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto px-4">
        <div class="bg-white/5
                    rounded-2xl p-8
                    border border-white/10">

            <form action="{{ route('admin.products.create') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Nazwa -->
                <div>
                    <label for="name" class="block text-sm text-gray-400 mb-1">
                        Nazwa produktu
                    </label>
                    <input type="text" id="name" name="name" required
                           class="w-full bg-white/10 text-white
                                  border border-white/10 rounded-lg px-4 py-2
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Opis -->
                <div>
                    <label for="description" class="block text-sm text-gray-400 mb-1">
                        Opis
                    </label>
                    <textarea id="description" name="description" required
                              class="w-full bg-white/10 text-white
                                     border border-white/10 rounded-lg px-4 py-2
                                     focus:outline-none focus:ring-2 focus:ring-indigo-500
                                     resize-none h-24"></textarea>
                </div>

                <!-- Wersja -->
                <div>
                    <label for="version" class="block text-sm text-gray-400 mb-1">
                        Wersja
                    </label>
                    <input type="text" id="version" name="version" required
                           class="w-full bg-white/10 text-white
                                  border border-white/10 rounded-lg px-4 py-2
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Cena -->
                <div>
                    <label for="price" class="block text-sm text-gray-400 mb-1">
                        Cena (PLN)
                    </label>
                    <input type="number" id="price" name="price" step="0.01" required
                           class="w-full bg-white/10 text-white
                                  border border-white/10 rounded-lg px-4 py-2
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Submit -->
                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-green-600 hover:bg-green-700
                                   text-white font-medium
                                   px-6 py-2 rounded-lg
                                   shadow-[0_0_7px_rgba(34,197,94,0.5)]
                                   transition">
                        Dodaj produkt
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
