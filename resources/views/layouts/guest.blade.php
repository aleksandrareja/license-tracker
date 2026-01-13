<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'License tracker') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-white antialiased">
        <div class="min-h-screen flex flex-col justify-center items-center px-4
                    bg-gradient-to-br from-zinc-950 via-zinc-900 to-indigo-950">

            <!-- Logo -->
            <div class="mb-6">
                <a href="/" class="flex items-center justify-center">
                    <x-application-logo
                        class="w-20 h-20 fill-current text-white" />
                </a>
            </div>

            <!-- Card -->
            <div class="w-full sm:max-w-md p-8 rounded-2xl
                        bg-white/5 backdrop-blur-xl
                        border border-white/10
                        shadow-[0_0_30px_rgba(99,102,241,0.45)]">

                {{ $slot }}

            </div>
        </div>
    </body>
</html>
