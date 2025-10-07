<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-telah-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col md:flex-row">
            <!-- Kolom Kiri (Branding) - Tampil di Desktop -->
            <div class="hidden md:flex md:w-1/2 bg-gray-900 items-center justify-center p-12 text-center relative overflow-hidden">
                <div class="z-10">
                    <h1 class="text-white text-4xl lg:text-5xl font-bold">Lepak Komputer Shop</h1>
                    <p class="text-gray-400 mt-2">Pusatnya Komputer Berkualitas dan Terpercaya.</p>
                </div>
                 <!-- Efek Latar Belakang -->
                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-indigo-600 via-gray-900 to-gray-900 opacity-40"></div>
            </div>

            <!-- Kolom Kanan (Form) -->
            <div class="w-full md:w-1/2 flex flex-col items-center justify-center bg-gray-100 p-6 md:p-12">
                <!-- Logo untuk mobile -->
                 <div class="md:hidden mb-6">
                    <a href="/">
                        <h1 class="text-gray-800 text-3xl font-bold">Lepak Komputer Shop</h1>
                    </a>
                </div>
                <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-lg">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
