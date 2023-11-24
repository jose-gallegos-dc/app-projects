<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">

    <nav class="flex items-center justify-center md:justify-between flex-wrap bg-teal-500 p-6">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <svg class="fill-current h-8 w-8 mr-2" width="32" height="32" viewBox="0 0 54 54"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z" />
            </svg>
            <span class="font-semibold text-xl tracking-tight">Tailwind CSS</span>
        </div>

        <div class="block  items-center w-auto">
            <div class="text-sm flex flex-row">
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
