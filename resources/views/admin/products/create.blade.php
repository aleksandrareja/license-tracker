<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">
            Add New Product
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto px-4">
        <div class="bg-white/5
                    rounded-2xl p-8
                    border border-white/10">

            <form action="{{ route('admin.products.create') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm text-gray-400 mb-1">
                        Product Name
                    </label>
                    <input type="text" id="name" name="name" required
                           class="w-full bg-white/10 text-white
                                  border border-white/10 rounded-lg px-4 py-2
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm text-gray-400 mb-1">
                        Description
                    </label>
                    <textarea id="description" name="description" required
                              class="w-full bg-white/10 text-white
                                     border border-white/10 rounded-lg px-4 py-2
                                     focus:outline-none focus:ring-2 focus:ring-indigo-500
                                     resize-none h-24"></textarea>
                </div>

                <!-- Version -->
                <div>
                    <label for="version" class="block text-sm text-gray-400 mb-1">
                        Version
                    </label>
                    <input type="text" id="version" name="version" required
                           class="w-full bg-white/10 text-white
                                  border border-white/10 rounded-lg px-4 py-2
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block text-sm text-gray-400 mb-1">
                        Price ($)
                    </label>
                    <input type="number" id="price" name="price" step="0.01" min="0" required
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
                        Add product
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
