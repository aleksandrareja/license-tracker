<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">
            My Licenses
        </h2>
    </x-slot>

    <div class="py-12 max-w-6xl mx-auto px-4">
        <div class="grid gap-6">
            @foreach($licenses as $license)

            @php
                $shadowClass = $license->status === 'active' && $license->getEffectiveStatusAttribute() === 'active'
                    ? 'shadow-[0_0_10px_rgba(99,102,241,0.4)] hover:shadow-[0_0_20px_rgba(99,102,241,0.6)]'
                    : 'shadow-[0_0_10px_rgba(100,0,0,0.4)] hover:shadow-[0_0_20px_rgba(100,0,0,0.6)]';
            @endphp

                <div class="bg-white/5 backdrop-blur-xl p-6 rounded-2xl border border-white/10
                            {{ $shadowClass }}
                            transition">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4 items-center">
                        <div>
                            <strong class="text-gray-400">Product:</strong>
                            <p class="text-white">{{ $license->product->name }} (v{{ $license->product->version }})</p>
                        </div>
                        <div>
                            <strong class="text-gray-400">Key:</strong>
                            <p class="text-indigo-400 font-mono">{{ $license->key }}</p>
                        </div>
                        <div>
                            <strong class="text-gray-400">Expiration Date:</strong>
                            <p class="text-white">{{ $license->expiration_date }}</p>
                        </div>
                        <div>
                            <strong class="text-gray-400">Expires in:</strong>
                            <p class="text-white">{{ $license->daysUntilExpiration() }}</p>
                        </div>
                        <div>
                            <strong class="text-gray-400">Status:</strong>
                            <p class="{{ $license->getEffectiveStatusAttribute() == 'active' ? 'text-green-400' : ($license->getEffectiveStatusAttribute() == 'expired' ? 'text-red-400' : 'text-yellow-400') }}">
                                {{ ucfirst($license->getEffectiveStatusAttribute()) }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
             
        </div>
    </div>
</x-app-layout>
