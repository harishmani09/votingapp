<x-app-layout>

    <div>
        <a href="/" class="flex items-center font-semibold hover:underline">
            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>

            <span class="ml-2">All Ideas</span>
        </a>
    </div>
    <div class="idea-container rounded-xl flex bg-white">
        <div class="flex space-x-6">
            <a href=""><img class="w-20 h-20 rounded-xl ml-8 mr-2"
                    src="https://source.unsplash.com/200x200/?face&v=3" alt=""></a>
            <div class="container">
                <h4 class="text-xl font-semibold">
                    <a href="#" class="hover:underline">A random title can go here</a>
                </h4>
                <p class="my-6 line-clamp-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum nihil
                    soluta sint
                    nulla quam non rem placeat ab, voluptatum harum saepe dolorem voluptas, accusantium quasi
                    assumenda consequatur aspernatur cupiditate. Hic repudiandae eligendi ratione odit delectus,
                    iure iusto sunt quod sequi qui est, id voluptates, obcaecati nisi temporibus assumenda veritatis
                    veniam ullam! Accusamus tempore numquam quod, voluptate cumque officia, voluptas atque placeat
                    amet animi obcaecati reprehenderit laboriosam. Cum, iste rerum! Repudiandae laborum ex totam
                    error corporis, neque iusto fugiat sunt incidunt cum accusamus asperiores quam excepturi aliquam
                    necessitatibus reiciendis dicta harum quod! Voluptatum vel, beatae voluptatem necessitatibus
                    aspernatur quis maiores nihil.</p>
                <footer class="flex justify-between items-center mt-6">
                    <footer class="flex space-x-4">
                        <div class="text-gray-900 font-bold">John Doe</div>
                        <div>&bull;</div>
                        <div class="text-gray-400 text-xs">Category</div>
                        <div>&bull;</div>
                        <div class="font-semibold text-xs"> 3 comments</div>
                    </footer>
                    <footer class="flex space-x-2">
                        <button
                            class="py-2 px-4 rounded-lg text-center font-bold uppercase leading-none w-28 h-7 text-xs bg-slate-200">
                            open
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
                    <div class="text-xl leading-snug">12</div>
                    <div class="text-gray-400 text-xs leading-none">Votes</div>
                </div>
                <button type="button"
                    class="flex items-center justify-center h-11 text-xs bg-gray-200 w-28 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in">
                    <span class="ml-2">Vote</span>
                </button>
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
    <div class="comments-container relative space-y-6 ml-20 my-8">
        <!--start of comment container -->
        <div
            class="comment-container relative hover:shadow-md transition duration-150 ease-in-out cursor-pointer rounded-xl flex">
            <div class="flex flex-col border-r border-gray-100 px-5 py-8 ">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-500">votes</div>
                </div>
                <div class="mt-8 w-20">
                    <button
                        class="bg-gray-200 py-2 px-4 uppercase rounded-xl text-xxs font-semibold hover:bg-gray-400 transition duration-150 ease-in">vote</button>
                </div>
            </div>
            <div class="flex space-x-6">
                <a href=""><img class="w-20 h-20 rounded-xl" src="https://i.pravatar.cc/20"
                        alt=""></a>
                <div class="container">
                    {{-- <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4> --}}
                    <p class="my-6 line-clamp-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum nihil
                        soluta sint
                        nulla quam non rem placeat ab, voluptatum harum saepe dolorem voluptas, accusantium quasi
                        assumenda consequatur aspernatur cupiditate. Hic repudiandae eligendi ratione odit delectus,
                        iure iusto sunt quod sequi qui est, id voluptates, obcaecati nisi temporibus assumenda veritatis
                        veniam ullam! Accusamus tempore numquam quod, voluptate cumque officia, voluptas atque placeat
                        amet animi obcaecati reprehenderit laboriosam. Cum, iste rerum! Repudiandae laborum ex totam
                        error corporis, neque iusto fugiat sunt incidunt cum accusamus asperiores quam excepturi aliquam
                        necessitatibus reiciendis dicta harum quod! Voluptatum vel, beatae voluptatem necessitatibus
                        aspernatur quis maiores nihil.</p>
                    <footer class="flex justify-between items-center mt-6">
                        <footer class="flex space-x-4">
                            <div class="text-gray-900 font-bold">John Doe</div>
                            <div class="text-gray-400 text-xs">10 hours ago</div>

                        </footer>
                        <footer class="flex space-x-2">

                            <button x-data="{ open: false }">

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
        <div
            class="comment-container relative hover:shadow-md transition duration-150 ease-in-out cursor-pointer rounded-xl flex">
            <div class="flex flex-col border-r border-gray-100 px-5 py-8 ">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-500">votes</div>
                </div>
                <div class="mt-8 w-20">
                    <button
                        class="bg-gray-200 py-2 px-4 uppercase rounded-xl text-xxs font-semibold hover:bg-gray-400 transition duration-150 ease-in">vote</button>
                </div>
            </div>
            <div class="flex space-x-6">
                <a href=""><img class="w-20 h-20 rounded-xl" src="https://i.pravatar.cc/20"
                        alt=""></a>
                <div class="container">
                    {{-- <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4> --}}
                    <p class="my-6 line-clamp-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum nihil
                        soluta sint
                        nulla quam non rem placeat ab, voluptatum harum saepe dolorem voluptas, accusantium quasi
                        assumenda consequatur aspernatur cupiditate. Hic repudiandae eligendi ratione odit delectus,
                        iure iusto sunt quod sequi qui est, id voluptates, obcaecati nisi temporibus assumenda veritatis
                        veniam ullam! Accusamus tempore numquam quod, voluptate cumque officia, voluptas atque placeat
                        amet animi obcaecati reprehenderit laboriosam. Cum, iste rerum! Repudiandae laborum ex totam
                        error corporis, neque iusto fugiat sunt incidunt cum accusamus asperiores quam excepturi aliquam
                        necessitatibus reiciendis dicta harum quod! Voluptatum vel, beatae voluptatem necessitatibus
                        aspernatur quis maiores nihil.</p>
                    <footer class="flex justify-between items-center mt-6">
                        <footer class="flex space-x-4">
                            <div class="text-gray-900 font-bold">John Doe</div>
                            <div class="text-gray-400 text-xs">10 hours ago</div>

                        </footer>
                        <footer class="flex space-x-2">

                            <button x-data="{ open: false }">

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
        <!--end of comment container -->

        <!--start of admin comment container -->
        <div
            class="is-admin relative hover:shadow-md transition duration-150 ease-in-out cursor-pointer rounded-xl flex">
            <div class="flex flex-col border-r border-gray-100 px-5 py-8 ">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-500">votes</div>
                </div>
                <div class="mt-8 w-20">
                    <button
                        class="bg-gray-200 py-2 px-4 uppercase rounded-xl text-xxs font-semibold hover:bg-gray-400 transition duration-150 ease-in">vote</button>
                </div>
            </div>
            <div class="flex space-x-6">
                <div class="flex flex-col items-center">
                    <a href=""><img class="w-20 h-20 rounded-xl"
                            src="https://source.unsplash.com/200x200/?face&v=4" alt=""></a>
                    <div class="text-blue text-xs uppercase font-bold">Admin</div>
                </div>
                <div class="container">
                    <h4 class="text-xl text-blue font-semibold">
                        <a href="#" class="hover:underline">Status Changed to "Under Consideration"</a>
                    </h4>
                    <p class="my-6 line-clamp-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum nihil
                        soluta sint
                        nulla quam non rem placeat ab, voluptatum harum saepe dolorem voluptas, accusantium quasi
                        assumenda consequatur aspernatur cupiditate. Hic repudiandae eligendi ratione odit delectus,
                        iure iusto sunt quod sequi qui est, id voluptates, obcaecati nisi temporibus assumenda veritatis
                        veniam ullam! Accusamus tempore numquam quod, voluptate cumque officia, voluptas atque placeat
                        amet animi obcaecati reprehenderit laboriosam. Cum, iste rerum! Repudiandae laborum ex totam
                        error corporis, neque iusto fugiat sunt incidunt cum accusamus asperiores quam excepturi aliquam
                        necessitatibus reiciendis dicta harum quod! Voluptatum vel, beatae voluptatem necessitatibus
                        aspernatur quis maiores nihil.</p>
                    <footer class="flex justify-between items-center mt-6">
                        <footer class="flex space-x-4">
                            <div class="text-blue font-bold">Andrea</div>
                            <div class="text-gray-400 text-xs">10 hours ago</div>

                        </footer>
                        <footer class="flex space-x-2">

                            <button x-data="{ open: false }">

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
        <!--end of admin comment container -->
    </div>
    <!--end of comments container -->

    <!--end of idea container -->

</x-app-layout>
