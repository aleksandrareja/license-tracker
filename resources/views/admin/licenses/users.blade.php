<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">
            Users of license: {{ $license->product->name }}
        </h2>
    </x-slot>

    <!-- Users -->
    <div class="py-12 max-w-4xl mx-auto px-4">
        <div class="bg-white/5 p-6 rounded-2xl border border-white/10">
            <table class="w-full text-gray-200 border-collapse text-center">
                <thead>
                    <tr class="bg-white/10 text-gray-300">
                        <th class="p-2">ID</th>
                        <th class="p-2">Name</th>
                        <th class="p-2">Email</th>
                        <th class="p-2">Role</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="border-t border-white/10">
                            <td class="p-2">{{ $user->id }}</td>
                            <td class="p-2">{{ $user->name }}</td>
                            <td class="p-2">{{ $user->email }}</td>
                            <td class="p-2">{{ $user->role }}</td>
                            <td class="p-2">
                                <form action="{{ route('admin.licenses.remove_user', $license->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <button type="submit" 
                                            class="text-red-400 hover:text-red-300 transition"
                                            onclick="return confirm('Are you sure you want to remove this user?')">
                                        Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add user -->
    <div class="py-0 max-w-4xl mx-auto px-4">
        <div class="bg-white/5 p-6 rounded-2xl border border-white/10 mt-6">
            <h2 class="text-lg font-semibold text-white mb-4">Add user to license</h2>
            <form action="{{ route('admin.licenses.add_user', $license->id) }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="user_id" class="block text-sm text-gray-400 mb-1">Select user:</label>
                    <select id="user_id" name="user_id" required
                            class="w-full bg-white/10 text-gray-400 border border-white/10 rounded-lg px-4 py-2
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">-- Select user --</option>
                        @foreach($other_users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="submit" 
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-6 py-2 rounded-lg
                                   shadow-[0_0_7px_rgba(99,102,241,0.6)] transition">
                        Add user
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
