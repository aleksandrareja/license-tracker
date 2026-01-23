<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">
            Add New License
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto px-4">
        <div class="bg-white/5 p-8 rounded-2xl border border-white/10">

            <form action="{{ route('admin.licenses.add') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Product -->
                <div>
                    <label for="product_id" class="block text-sm text-gray-400 mb-1">Product</label>
                    <select id="product_id" name="product_id" required
                            class="w-full bg-white/10 text-gray-400 border border-white/10 rounded-lg px-4 py-2
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">Choose product</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- License key -->
                <div>
                    <label for="key" class="block text-sm text-gray-400 mb-1">License key</label>
                    <textarea id="key" name="key" required
                              class="w-full bg-white/10 text-white border border-white/10 rounded-lg px-4 py-2
                                     focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-none h-24"></textarea>
                </div>

                <!-- Max users -->
                <div>
                    <label for="max_users" class="block text-sm text-gray-400 mb-1">Max users</label>
                    <input type="number" id="max_users" name="max_users" min="1" required
                           class="w-full bg-white/10 text-white border border-white/10 rounded-lg px-4 py-2
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Expiration date -->
                <div>
                    <label for="expiration_date" class="block text-sm text-gray-400 mb-1">Expiration date</label>
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
                        <option value="active">Active</option>
                        <option value="suspended">Suspended</option>
                    </select>
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block text-sm text-gray-400 mb-1">Price ($)</label>
                    <input type="number" id="price" name="price" step="0.01" min="0" required
                           class="w-full bg-white/10 text-white border border-white/10 rounded-lg px-4 py-2
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Submit -->
                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white font-medium px-6 py-2 rounded-lg
                                   shadow-[0_0_7px_rgba(34,197,94,0.5)] transition">
                        Add License
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
