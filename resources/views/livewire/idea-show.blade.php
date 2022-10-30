<div class="idea-button-container">
    <div class="idea-container rounded-xl flex bg-white">
        <div class="flex flex-col md:flex-row space-x-6">
            <a href=""><img class="w-20 h-20 rounded-xl ml-8 mr-2"
                    src="https://source.unsplash.com/200x200/?face&v=3" alt=""></a>
            <div class="container">
                <h4 class="text-xl font-semibold">
                    <a href="#" class="hover:underline">{{ $idea->title }}</a>
                </h4>
                <p class="my-6 line-clamp-3">{{ $idea->description }}</p>
                <footer class="flex justify-between flex-col md:flex-row space-y-4 md:space-y-0 md:items-center mt-6">
                    <footer class="flex space-x-4">
                        <div class="hidden md:block text-gray-900 font-bold">{{ $idea->user->name }}</div>
                        <div class="hidden md:block">&bull;</div>
                        <div class="hidden md:block text-gray-900 font-bold">Published
                            {{ $idea->created_at->diffForHumans() }}</div>
                        <div class="hidden md:block">&bull;</div>
                        <div class="text-gray-400 text-xs">{{ $idea->category->name }}</div>
                        <div>&bull;</div>
                        <div class="font-semibold text-xs"> 3 comments</div>
                    </footer>
                    <footer class="flex space-x-2">
                        <button
                            class="{{ $idea->status->classes }} py-2 px-4 rounded-lg text-center font-bold uppercase leading-none w-28 h-7 text-xs ">
                            {{ $idea->status->name }}
                        </button>
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
                    </footer>
                </footer>

            </div>
        </div>
    </div>
    <div x-data="{ commentopen: false }">
        <div class="button-container flex items-center justify-between mt-6 ">
            <div class="flex space-x-6">

                <button @click="commentopen = !commentopen"
                    class="py-4 px-6 rounded-lg text-center text-white font-bold uppercase leading-none w-28 text-xs bg-blue">
                    Reply
                </button>
                <div class="relative" x-data="{ isopen: false }">
                    <button type="button" @click="isopen=!isopen"
                        class="flex items-center justify-center h-11 text-xs bg-gray-200 w-28 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in">
                        <span class="ml-2">Set Status</span>
                        <span><svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>

                        </span>
                    </button>
                    <div x-show.trasition.origin.top.left="isopen" @keydown.escape.window="isopen=false"
                        @click.away="isopen=false" x-cloak
                        class="absolute z-10 w-76 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2">
                        <form action="#" class="space-y-4 px-4 py-6">
                            <div class="space-y-2">
                                <div>
                                    <label class="inline-flex items-center">
                                        <input class="form-radio border-none text-green bg-gray-200" type="radio"
                                            checked="" name="radio-direct" value="open">
                                        <span class="ml-2">Open</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input class="form-radio border-none text-gray bg-gray-200" type="radio"
                                            name="radio-direct" value="considering">
                                        <span class="ml-2">Considering</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input class="form-radio border-none text-yellow bg-gray-200" type="radio"
                                            name="radio-direct" value="in-progress">
                                        <span class="ml-2">In Progress</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input class="form-radio border-none text-green bg-gray-200" type="radio"
                                            name="radio-direct" value="implemented">
                                        <span class="ml-2">Implemented</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input class="form-radio border-none text-red bg-gray-200" type="radio"
                                            name="radio-direct" value="closed">
                                        <span class="ml-2">Closed</span>
                                    </label>
                                </div>
                            </div>
                            <div>
                                <textarea name="update_comment" id="update_comment" cols="25" rows="5"
                                    class="border-none rounded-xl bg-gray-100 w-full text-sm placeholder-gray-800 py-2 px-3 "
                                    placeholder="Add or Update Comment "></textarea>
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

                                    Update
                                </button>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input name="notify_voter" class="bg-gray-100 rounded" type="checkbox" checked />
                                    <span class="ml-2">Notify All Voters</span>
                                </label>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                    <div class="text-xl leading-snug @if ($hasVoted) text-blue @endif">
                        {{ $votesCount }}</div>
                    <div class="text-gray-400 text-xs leading-none">Votes</div>
                </div>
                @if ($hasVoted)
                    <button type="button" wire:click.prevent="vote"
                        class="flex items-center text-white justify-center h-11 text-xs bg-blue w-28 font-semibold rounded-xl border border-gray-200 hover:border-blue transition duration-150 ease-in">
                        <span class="ml-2">Voted</span>
                    </button>
                @else
                    <button type="button" wire:click.prevent="vote"
                        class="flex items-center justify-center h-11 text-xs bg-gray-200 w-28 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in">
                        <span class="ml-2">Vote</span>
                    </button>
                @endif
            </div>
        </div> <!-- end of button container -->


        <div x-show="commentopen" @click.away="commentopen=false" @keydown.escape.window="commentopen=false"
            class="z-10 w-104 text-left font-semibold text-sm bg-white rounded-xl mt-2 shadow-dialog">
            <form action="#" class="space-y-4 px-4 py-6">
                <textarea name="post_comment" id="post_comment" cols="30" rows="4"
                    class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2"
                    placeholder="share your thoughts..."></textarea>
            </form>
            <div class="flex">
                <button type="button"
                    class="flex items-center justify-center h-11 text-xs bg-blue text-white w-1/2 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in">
                    <span class="ml-2">Post Comment</span>

                </button>
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
            </div>
        </div>
    </div>
</div>
