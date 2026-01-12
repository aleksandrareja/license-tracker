<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Panel Administratora
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-6 p-6 bg-white/5 dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mt-2 text-xl font-bold text-white">
                    Witaj w panelu administratora!
                </div>
            </div>

           <div class="mt-6 p-6 bg-white/5 dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="text-xl font-semibold text-white mb-4">Statystyki</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Użytkownicy -->
                    <div class="bg-white/5 backdrop-blur-xl p-5 rounded-2xl border border-white/10
                                shadow-[0_0_12px_rgba(99,102,241,0.35)]
                                hover:shadow-[0_0_20px_rgba(99,102,241,0.6)]
                                transition text-center">
                        <h3 class="text-sm uppercase tracking-wide text-indigo-300">Użytkownicy</h3>
                        <p class="mt-2 text-3xl font-bold text-white">{{ \App\Models\User::countUsers() }}</p>
                    </div>

                    <!-- Licencje aktywne -->
                    <div class="bg-white/5 backdrop-blur-xl p-5 rounded-2xl border border-white/10
                                shadow-[0_0_12px_rgba(99,102,241,0.35)]
                                hover:shadow-[0_0_20px_rgba(99,102,241,0.6)]
                                transition text-center">
                        <h3 class="text-sm uppercase tracking-wide text-indigo-300">Licencje aktywne</h3>
                        <p class="mt-2 text-3xl font-bold text-white">{{ \App\Models\License::activeLicensesCount() }}</p>
                    </div>

                    <!-- Łączny koszt -->
                    <div class="bg-white/5 backdrop-blur-xl p-5 rounded-2xl border border-white/10
                                shadow-[0_0_12px_rgba(99,102,241,0.35)]
                                hover:shadow-[0_0_20px_rgba(99,102,241,0.6)]
                                transition text-center">
                        <h3 class="text-sm uppercase tracking-wide text-indigo-300">Łączny koszt aktywnych licencji</h3>
                        <p class="mt-2 text-3xl font-bold text-white">{{ \App\Models\License::totalRevenue() }} zł</p>
                    </div>
                </div>
                <h2 class="text-xl font-semibold text-white my-5">Wkrótce wygasające licencje</h2>
                <div class="grid gap-6">
                    @foreach($expiringLicenses as $license)
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


            <div class="mt-6 p-6 bg-white/5 dark:bg-gray-900 rounded-2xl border border-white/10">
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


           <div class="mt-6 p-6 bg-white/5 dark:bg-gray-900 rounded-2xl border border-white/10">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    
                    <a href="{{ route('admin.users') }}"
                    class="flex items-center justify-center
                            px-5 py-4 rounded-xl font-semibold text-white
                            bg-blue-600/90 hover:bg-blue-500
                            shadow-[0_0_12px_rgba(59,130,246,0.45)]
                            transition">
                        Zarządzaj użytkownikami
                    </a>

                    <a href="{{ route('admin.products') }}"
                    class="flex items-center justify-center
                            px-5 py-4 rounded-xl font-semibold text-white
                            bg-emerald-600/90 hover:bg-emerald-500
                            shadow-[0_0_12px_rgba(16,185,129,0.45)]
                            transition">
                        Zarządzaj produktami
                    </a>

                    <a href="{{ route('admin.licenses') }}"
                    class="flex items-center justify-center
                            px-5 py-4 rounded-xl font-semibold text-white
                            bg-amber-500/90 hover:bg-amber-500
                            shadow-[0_0_12px_rgba(245,158,11,0.45)]
                            transition">
                        Zarządzaj licencjami
                    </a>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>