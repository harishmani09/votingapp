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
                    <p class="text-xs">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero, est.</p>
                </div>

                <form action="#" method="POST" class="space-y-4 py-6 px-4">
                    @csrf
                    <div>
                        <input type="text" placeholder="your idea..."
                            class="w-full bg-gray-100 border-none rounded-xl placeholder-gray-900 px-4   py-6 text-xs">
                    </div>
                    <div>
                        <select name="category_add" id="category_add"
                            class="w-full rounded-xl py-2 px-4 bg-gray-100 border-none text-xs">
                            <option value="category" class="">Category</option>
                            <option value="category-one" class="">Category One</option>
                            <option value="category-two" class="">Category Two</option>
                            <option value="category-three" class="">Category Three</option>
                        </select>
                    </div>
                    <div>
                        <textarea name="" id="" cols="25" rows="5"
                            class="border-none bg-gray-100 text-gray-500 w-full rounded-xl">describe your idea here...</textarea>
                    </div>
                    <div class="flex justify-between space-x-4 items-center">
                        <button type="button"
                            class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in">
                            <span class="ml-2">Attach</span>
                            <span><svg class="w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                </svg>
                            </span>
                        </button>
                        <button type="button"
                            class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in text-white">

                            Submit
                        </button>
                    </div>
                </form>

            </div>
        </div>
        <div class="w-full md:w-175 px-2 md:px-0">
            <nav class=" hidden md:flex items-center justify-between text-xs">
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
