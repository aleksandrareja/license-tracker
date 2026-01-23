<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">
            Licenses List
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto px-4">

        <!-- Add license -->
        <div class="mb-6 flex justify-end">
            <a href="{{ route('admin.licenses.add') }}"
               class="bg-green-600 hover:bg-green-700
                      text-white font-medium
                      px-5 py-2 rounded-lg
                      shadow-[0_0_7px_rgba(34,197,94,0.5)]
                      transition">
                + Add new license
            </a>
        </div>

        <!-- Licenses -->
        <div class="space-y-4">
            @foreach($licenses as $license)
                <div class="bg-white/5 backdrop-blur-xl
                            rounded-2xl p-4
                            border border-white/10
                            shadow-[0_0_10px_rgba(99,102,241,0.3)]
                            hover:shadow-[0_0_20px_rgba(99,102,241,0.5)]
                            transition flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                    <!-- License details -->
                    <div class="flex-1 grid grid-cols-2 md:grid-cols-5 gap-4 md:gap-6">
                        <div>
                            <span class="text-gray-400 text-sm">ID</span>
                            <p class="text-white font-medium">{{ $license->id }}</p>
                        </div>
                        <div>
                            <span class="text-gray-400 text-sm">Product</span>
                            <p class="text-white">{{ $license->product->name }}</p>
                        </div>
                        <div>
                            <span class="text-gray-400 text-sm">Version</span>
                            <p class="text-white">{{ $license->product->version }}</p>
                        </div>
                        <div>
                            <span class="text-gray-400 text-sm">Key</span>
                            <p class="text-indigo-400 font-mono text-sm">{{ $license->key }}</p>
                        </div>
                        <div>
                            <span class="text-gray-400 text-sm">Users</span>
                            <p class="text-white">{{ $license->countCurrentUsers() }}/{{ $license->max_users }}</p>
                        </div>
                        <div>
                            <span class="text-gray-400 text-sm">Status</span>
                            <p class="{{ $license->getEffectiveStatusAttribute() === 'active' ? 'text-green-400' : ($license->getEffectiveStatusAttribute() === 'expired' ? 'text-red-400' : 'text-yellow-400') }}">{{ $license->getEffectiveStatusAttribute() }}</p>
                        </div>
                        <div>
                            <span class="text-gray-400 text-sm">Expiration date</span>
                            <p class="text-white">{{ $license->expiration_date }}</p>
                        </div>
                        <div>
                            <span class="text-gray-400 text-sm">Price</span>
                            <p class="text-indigo-400 font-semibold">{{ $license->price }} $</p>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex gap-3 md:flex-col md:items-end mt-2 md:mt-0">
                        <a href="{{ route('admin.licenses.edit', $license->id) }}"
                           class="text-indigo-400 hover:text-indigo-300 text-sm transition">
                            Edit
                        </a>
                        <a href="{{ route('admin.licenses.users', $license->id) }}"
                           class="text-indigo-400 hover:text-indigo-300 text-sm transition">
                            Users
                        </a>
                        <form action="{{ route('admin.licenses.delete', $license->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-red-400 hover:text-red-300 text-sm transition"
                                    onclick="return confirm('Are you sure you want to delete this license?')">
                                Delete
                            </button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
