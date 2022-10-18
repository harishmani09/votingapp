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
</head>

<body class="font-sans text-gray-900 text-sm bg-gray-background">

    <header class="flex items-center justify-between px-8 py-4">
        <a href="#"><img src="{{ asset('img/logo.svg') }}" alt="logo"></a>
        <div class="flex items-center">
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
                <img src="https://i.pravatar.cc/300?email=harish@gmail.com" alt="avatar"
                    class="w-10 h-10 rounded-full">
            </a>
        </div>
    </header>
    <main class="flex mx-auto container max-w-custom">
        <div class="flex-1 mr-5 w-70"> <strong>Add Idea form goes here!</strong>
            consectetur
            adipisicing elit.
            Dolorem
            earum recusandae amet
            reprehenderit magni vero similique vel! Assumenda beatae officia et, sequi maxime veniam repudiandae
            corporis eaque nam perspiciatis numquam illum doloremque, quae rem minus culpa dolores alias ipsa! In, ad
            dolores laborum voluptates ab at odio perspiciatis placeat odit animi ipsum libero sint itaque. Distinctio
            veritatis laudantium non pariatur fugit iste, eveniet quos velit molestias illum excepturi facere sequi
            asperiores doloremque at quia recusandae dicta aperiam fuga error sed odio ullam dolorum labore. Delectus
            natus explicabo cupiditate est nemo eligendi sequi cum rem nisi beatae. Ipsam ut commodi velit!</div>
        <div class=" w-175" style="max-width: 700px">
            <nav class="flex items-center justify-between text-xs">
                <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3">
                    <li><a href="#" class="border-b-4 border-blue pb-3">All Ideas(87)</a></li>
                    <li><a href="#"
                            class="border-b-4 text-gray-400 pb-3 transition duration-150 hover:border-blue ">Considering(6)</a>
                    </li>
                    <li><a href="#"
                            class="border-b-4 text-gray-400 pb-3 transition duration-150 hover:border-blue ">In
                            Progress(6)</a>
                    </li>

                </ul>
                <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3">
                    <li><a href="#"
                            class="border-b-4  pb-3 transition duration-150 hover:border-blue">Implemented(10)</a></li>
                    <li><a href="#"
                            class="border-b-4 text-gray-400 pb-3 transition duration-150 hover:border-blue ">Closed(20)</a>
                    </li>

                </ul>
            </nav>
            <div class="mt-8">
                {{ $slot }}
            </div>
        </div>
    </main>
</body>

</html>
