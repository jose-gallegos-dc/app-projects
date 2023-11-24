<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900">

    <nav class="flex items-center justify-center md:justify-between flex-wrap bg-teal-500 p-3">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <a href="/" wire:navigate>
                <x-application-logo class="w-15 h-10 fill-current text-gray-500 ms-3" />
            </a>
        </div>

        <div class="block  items-center w-auto">
            <div class="text-md flex flex-row">
                <a href="{{ url('/') }}"
                    class="block mt-4 lg:inline-block lg:mt-0 hover:text-white mr-4 {{ Request::is('/') ? 'text-white' : 'text-teal-200' }}">
                    Inicio
                </a>

                @guest
                    <a href="{{ route('login') }}"
                        class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                        Iniciar sesión
                    </a>
                @endguest

                @hasrole('editor|admin')
                    <a href="{{ url('dashboard') }}"
                        class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                        Panel
                    </a>
                @endrole
            </div>

        </div>
    </nav>

    <div
        class="w-full h-full flex justify-center items-center bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900">
        {{ $slot }}
    </div>
</body>

</html>
