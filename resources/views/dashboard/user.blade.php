<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Panel użytkownika
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-6 p-6 bg-white/5 dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mt-2 text-xl font-bold text-white">
                    Witaj w panelu użytkownika!
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="mt-6 p-6 bg-white/5 dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="text-xl font-semibold text-white mb-4">Wkrótce wygasające licencje</h2>
                <div class="grid gap-6">
                    @foreach($usersExpiringLicenses as $license)
                        <div class="bg-white/5 backdrop-blur-xl p-6 rounded-2xl border border-white/10
                                    shadow-[0_0_10px_rgba(99,102,241,0.4)] hover:shadow-[0_0_20px_rgba(99,102,241,0.6)]
                                    transition">
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4 items-center">
                                <div>
                                    <strong class="text-gray-400">Produkt:</strong>
                                    <p class="text-white">{{ $license->product->name }} (v{{ $license->product->version }})</p>
                                </div>
                                <div>
                                    <strong class="text-gray-400">Klucz:</strong>
                                    <p class="text-indigo-400 font-mono">{{ $license->key }}</p>
                                </div>
                                <div>
                                    <strong class="text-gray-400">Data wygaśnięcia:</strong>
                                    <p class="text-white">{{ $license->expiration_date }}</p>
                                </div>
                                <div>
                                    <strong class="text-gray-400">Wygasa za:</strong>
                                    <p class="text-white">{{ $license->daysUntilExpiration() }}</p>
                                </div>
                                <div>
                                    <strong class="text-gray-400">Status:</strong>
                                    <p class="{{ $license->status == 'active' ? 'text-green-400' : ($license->status == 'expired' ? 'text-red-400' : 'text-yellow-400') }}">
                                        {{ ucfirst($license->status) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>


            <div class="mt-6 p-6 bg-white/5 dark:bg-gray-900 sm:rounded-lg">
                <h2 class="text-xl font-semibold text-white mb-4">Aktualne licencje</h2>

                <a href="{{ route('user.licenses') }}"
                class="inline-flex items-center justify-center
                        px-6 py-3 rounded-xl text-white font-semibold
                        bg-indigo-600/90 hover:bg-indigo-500
                        shadow-[0_0_15px_rgba(99,102,241,0.45)]
                        transition">
                    Zobacz moje licencje
                </a>
            </div>


        </div>
    </div>


    
</x-app-layout>