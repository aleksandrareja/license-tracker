<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edytuj licencję') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Formularz edycji licencji.") }}
                    <form action="{{ route('admin.licenses.update', $license->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="product_id">Nazwa:</label>
                            <select type="text" id="product_id" name="product_id" required>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ $license->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="key">Klucz licencji:</label>
                            <textarea id="key" name="key" required>{{ $license->key }}</textarea>
                        </div>
                        <div>
                            <label for="max_users">Maksymalna liczba użytkowników:</label>
                            <input type="number" id="max_users" name="max_users" value="{{ $license->max_users }}" required>
                        </div>
                        <div>
                            <label for="expiration_date">Data wygaśnięcia:</label>
                            <input type="date" id="expiration_date" name="expiration_date" value="{{ $license->expiration_date }}" required>
                        </div>
                        <div>
                            <label for="status">Status:</label>
                            <select id="status" name="status" required>
                                <option value="active" {{ $license->status == 'active' ? 'selected' : '' }}>Aktywna</option>
                                <option value="expired" {{ $license->status == 'expired' ? 'selected' : '' }}>Wygasła</option>
                                <option value="revoked" {{ $license->status == 'revoked' ? 'selected' : '' }}>Zawieszona</option>
                            </select>
                        </div>
                        <div>
                            <label for="price">Cena:</label>
                            <input type="number" id="price" name="price" value="{{ $license->price }}" step="0.01" required>
                        </div>
                        <div>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                                Zapisz
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>