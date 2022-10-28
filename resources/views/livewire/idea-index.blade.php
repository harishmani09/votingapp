<div x-data
    @click="const target = $event.target.tagName.toLowerCase()

                !['button', 'svg', 'path','a'].includes(target) && $event.target.closest('.idea-container').querySelector('.idea-link').click()

            {{-- $event.target.closest('.idea-container').querySelector('.idea-link').click() --}}
            "
    class="idea-container hover:shadow-md transition duration-150 ease-in-out cursor-pointer rounded-xl flex">
    <div class="hidden md:flex flex-col border-r border-gray-100 px-5 py-8 ">
        <div class="text-center">
            <div class="font-semibold text-2xl">{{ $votesCount }}</div>
            <div class="text-gray-500">votes</div>
        </div>
        <div class="mt-8 w-20">
            <button
                class="bg-gray-200 py-2 px-4 uppercase rounded-xl text-xxs font-semibold hover:bg-gray-400 transition duration-150 ease-in">vote</button>
        </div>
    </div>
    <div class="flex flex-col md:flex-row md:space-x-6 ml-8 md:ml-0">
        <a href=""><img class="w-20 h-20 rounded-xl" src="{{ $idea->user->avatar }}" alt=""></a>
        <div class="container mt-4 md:mt-0">
            <h4 class="text-xl font-semibold">

                <a href="{{ route('idea.show', $idea->slug) }} " class="idea-link hover:underline">{{ $idea->title }}
                </a>

            </h4>

            <p class="my-6 line-clamp-3">{{ $idea->description }}</p>
            <footer class="flex flex-col md:flex-row space-y-6 md:space-y-0 justify-between mt-6">
                <footer class="flex space-x-2">
                    <div class="text-gray-400 text-xs">{{ $idea->created_at->diffForHumans() }}</div>
                    <div>&bull;</div>
                    <div class="text-gray-400 text-xs">{{ $idea->category->name }}</div>
                    <div>&bull;</div>
                    <div class="font-semibold text-xs"> 3 comments</div>
                </footer>
                <footer class="flex space-x-2 justify-between">
                    <div
                        class="flex justify-between space-x-2 items-center  md:space-x-0 md:hidden rounded-xl h-10 px-4 py-4">
                        <div class="text-center">
                            <div class="font-semibold text-xl">{{ $votesCount }}</div>
                            <div class="text-gray-500">votes</div>
                        </div>
                        <div>
                            <button
                                class="py-2 px-0 md:px-4 rounded-lg text-center font-bold uppercase leading-none w-20 h-7 text-xs bg-slate-200">votes</button>
                        </div>
                    </div>
                    <div>
                        <button
                            class="{{ $idea->status->classes }} py-2 px-0 md:px-4 rounded-lg text-center font-bold uppercase leading-none w-28 h-7 text-xs ">{{ $idea->status->name }}</button>
                        <button x-data="{ open: false }" class="border rounded-full">

                            <svg @click="open = !open" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                            <ul x-show="open"
                                class="bg-white shadow-lg absolute w-44 font-semibold p-2 rounded-lg text-black text-xs space-y-2 ml-8">
                                <li><a class="transition hover:bg-gray-100 duration-150 ease-in px-3 py-1"
                                        href="#">
                                        Mark as spam
                                    </a></li>
                                <li><a href="#"
                                        class="transition hover:bg-gray-100 duration-150 ease-in px-3 py-1">
                                        Delete Post
                                    </a></li>
                            </ul>

                        </button>
                    </div>
                </footer>
            </footer>
        </div>
    </div>
</div>
