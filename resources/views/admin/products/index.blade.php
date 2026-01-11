<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">
            Lista produktów
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto px-4">

        <!-- Button -->
        <div class="mb-6 flex justify-end">
            <a href="{{ route('admin.products.create') }}"
               class="bg-green-600 hover:bg-green-700
                      text-white font-medium
                      px-5 py-2 rounded-lg
                      shadow-[0_0_7px_rgba(34,197,94,0.5)]
                      transition">
                + Dodaj produkt
            </a>
        </div>

        <!-- Cards grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($products as $product)
                <div class="bg-white/5 backdrop-blur-xl
                            rounded-2xl p-6
                            border border-white/10
                            shadow-[0_0_10px_rgba(99,102,241,0.35)]
                            hover:shadow-[0_0_20px_rgba(99,102,241,0.6)]
                            transition">

                    <!-- Header -->
                    <div class="mb-3">
                        <h3 class="text-lg font-semibold text-white">
                            {{ $product->name }}
                        </h3>
                        <p class="text-sm text-gray-400">
                            Wersja: {{ $product->version ?? '—' }}
                        </p>
                    </div>

                    <!-- Description -->
                    <p class="text-gray-300 text-sm mb-4 line-clamp-3">
                        {{ $product->description ?? 'Brak opisu produktu' }}
                    </p>

                    <!-- Price -->
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-gray-400 text-sm">Cena</span>
                        <span class="text-indigo-400 font-semibold text-lg">
                            {{ number_format($product->price, 2) }} zł
                        </span>
                    </div>

                    <!-- Actions -->
                    <div class="flex justify-end gap-4 text-sm">
                        <a href="{{ route('admin.products.edit', $product->id) }}"
                           class="text-indigo-400 hover:text-indigo-300 transition">
                            Edytuj
                        </a>

                        <form action="{{ route('admin.products.delete', $product->id) }}"
                              method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-red-400 hover:text-red-300 transition"
                                    onclick="return confirm('Czy na pewno chcesz usunąć ten produkt?')">
                                Usuń
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
