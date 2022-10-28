<x-app-layout>

    <div>
        <a href="/" class="flex items-center font-semibold hover:underline">
            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>

            <span class="ml-2">All Ideas</span>
        </a>
    </div>
    <!-- start of idea button container  -->
    <livewire:idea-show :idea="$idea" :votesCount="$votesCount" />
    <!-- end of idea button container  -->
    <div class="comments-container relative space-y-6 ml-20 my-8">
        <!--start of comment container -->
        <div
            class="comment-container relative hover:shadow-md transition duration-150 ease-in-out cursor-pointer rounded-xl flex">
            <div class="flex flex-col border-r border-gray-100 px-5 py-8 ">
                <div class="text-center hidden md:block">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-500">votes</div>
                </div>
                <div class="mt-8 w-20">
                    <button
                        class="bg-gray-200 py-2 px-4 uppercase rounded-xl text-xxs font-semibold hover:bg-gray-400 transition duration-150 ease-in">vote</button>
                </div>
            </div>
            <div class="flex space-x-0 md:space-x-6 flex-col md:flex-row">
                <a href=""><img class="w-20 h-20 rounded-xl" src="https://i.pravatar.cc/20" alt=""></a>
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
                <div class="text-center hidden md:block">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-500">votes</div>
                </div>
                <div class="mt-8 w-20">
                    <button
                        class="bg-gray-200 py-2 px-4 uppercase rounded-xl text-xxs font-semibold hover:bg-gray-400 transition duration-150 ease-in">vote</button>
                </div>
            </div>
            <div class="flex space-x-0 md:space-x-6 flex-col md:flex-row">
                <a href=""><img class="w-20 h-20 rounded-xl" src="https://i.pravatar.cc/20" alt=""></a>
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
