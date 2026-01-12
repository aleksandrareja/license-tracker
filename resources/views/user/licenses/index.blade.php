<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">
            Moje licencje
        </h2>
    </x-slot>

    <div class="py-12 max-w-6xl mx-auto px-4">
        <div class="grid gap-6">
            @foreach($licenses_active as $license_active)
                <div class="bg-white/5 backdrop-blur-xl p-6 rounded-2xl border border-white/10
                            shadow-[0_0_10px_rgba(99,102,241,0.4)] hover:shadow-[0_0_20px_rgba(99,102,241,0.6)]
                            transition">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4 items-center">
                        <div>
                            <strong class="text-gray-400">Produkt:</strong>
                            <p class="text-white">{{ $license_active->product->name }} (v{{ $license_active->product->version }})</p>
                        </div>
                        <div>
                            <strong class="text-gray-400">Klucz:</strong>
                            <p class="text-indigo-400 font-mono">{{ $license_active->key }}</p>
                        </div>
                        <div>
                            <strong class="text-gray-400">Data wygaśnięcia:</strong>
                            <p class="text-white">{{ $license_active->expiration_date }}</p>
                        </div>
                        <div>
                            <strong class="text-gray-400">Wygasa za:</strong>
                            <p class="text-white">{{ $license_active->daysUntilExpiration() }}</p>
                        </div>
                        <div>
                            <strong class="text-gray-400">Status:</strong>
                            <p class="{{ $license_active->status == 'active' ? 'text-green-400' : ($license_active->status == 'expired' ? 'text-red-400' : 'text-yellow-400') }}">
                                {{ ucfirst($license_active->status) }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

             @foreach($licenses_expired as $license_expired)
                <div class="bg-white/5 backdrop-blur-xl p-6 rounded-2xl border border-white/10
                            shadow-[0_0_10px_rgba(100,0,0,0.4)] hover:shadow-[0_0_20px_rgba(100,0,0,0.6)]
                            transition">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4 items-center">
                        <div>
                            <strong class="text-gray-400">Produkt:</strong>
                            <p class="text-white">{{ $license_expired->product->name }} (v{{ $license_expired->product->version }})</p>
                        </div>
                        <div>
                            <strong class="text-gray-400">Klucz:</strong>
                            <p class="text-indigo-400 font-mono">{{ $license_expired->key }}</p>
                        </div>
                        <div>
                            <strong class="text-gray-400">Data wygaśnięcia:</strong>
                            <p class="text-white">{{ $license_expired->expiration_date }}</p>
                        </div>
                        <div>
                            <strong class="text-gray-400">Wygasa za:</strong>
                            <p class="text-white">{{ $license_expired->daysUntilExpiration() }}</p>
                        </div>
                        <div>
                            <strong class="text-gray-400">Status:</strong>
                            <p class="{{ $license_expired->status == 'active' ? 'text-green-400' : ($license_expired->status == 'expired' ? 'text-red-400' : 'text-yellow-400') }}">
                                {{ ucfirst($license_expired->status) }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
