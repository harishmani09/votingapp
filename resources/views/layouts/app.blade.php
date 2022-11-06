<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel Voting App</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Open+Sans:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans text-gray-900 text-sm bg-gray-background">

    <header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">
        <a href="#"><img src="{{ asset('img/logo.svg') }}" alt="logo"></a>
        <div class="flex items-center mt-2 md:mt-1">
            @if (Route::has('login'))
                <div class=" px-6 py-4 ">
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <a href="#">
                <img src="https://i.pravatar.cc/300" alt="avatar" class="w-10 h-10 rounded-full">
            </a>
        </div>
    </header>
    <main class="flex flex-col md:flex-row mx-auto container max-w-custom">

        <div class=" mr-5 w-70 mx-auto md:mx-0 md:mr-5">
            <div class="border-blue md:sticky md:top-8 border-2 rounded-xl mt-16 bg-white">
                <div class="text-center bg-white rounded-lg px-6 py-2 pt-6">
                    <h3 class="font-semibold text-base">Add An Idea</h3>
                    @auth
                        <p class="text-xs">Please let us know what you will like to talk about
                        </p>
                    @else
                        pls login in to add ideas
                    @endauth

                </div>
                @auth

                    {{-- @livewire('create-idea') --}}
                    <livewire:create-idea />
                @else
                    <div class="my-6 text-center">
                        <a href="{{ route('login') }}"
                            class="inline-block items-center justify-center w-1/2 h-11 text-xs py-2 px-4 bg-blue font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in text-white">

                            Login
                        </a>
                        <a href="{{ route('register') }}"
                            class="mt-4 inline-block items-center justify-center w-1/2 h-11 text-xs py-2 px-4 bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in text-black">

                            Register
                        </a>
                    </div>
                @endauth
            </div>
        </div>
        <div class="w-full md:w-175 px-2 md:px-0">
            <livewire:status-filter />
            <div class="mt-8">
                {{ $slot }}
            </div>
        </div>
    </main>
    @livewireScripts
</body>

</html>
