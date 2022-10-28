<x-app-layout>
    <div class="filters flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-6">
        <div class="w-full md:w-1/3">
            <select name="category" id="category" class="w-full rounded-xl py-2 px-4 border-none">
                <option value="category" class="">Category</option>
                <option value="category-one" class="">Category One</option>
                <option value="category-two" class="">Category Two</option>
                <option value="category-three" class="">Category Three</option>
            </select>
        </div>
        <div class="w-full md:w-1/3">
            <select name="other_filter" id="other_filter" class="w-full rounded-xl py-2 px-4 border-none">
                <option value="filter" class="">Filter</option>
                <option value="filter-one" class="">Filter One</option>
                <option value="filter-two" class="">Filter Two</option>
                <option value="filter-three" class="">Filter Three</option>
            </select>
        </div>
        <div class="w-full md:w-2/3 relative">

            <input type="search" placeholder="find an idea..."
                class="border-none rounded-xl w-full px-4 py-2 placeholder-gray-900 ">
            <div class="absolute  flex items-center top-0 h-full ">
                <svg class="w-5 h-5 text-gray-700 pr-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>

            </div>
        </div>

    </div> <!-- end of filters  -->



    <div class="ideas-container space-y-6 my-6">
        @foreach ($ideas as $idea)
            <livewire:idea-index :idea="$idea" :votesCount="$idea->votes_count" />
        @endforeach
        <div class="idea-container hover:shadow-md transition duration-150 ease-in-out cursor-pointer rounded-xl flex">
            <div class="flex flex-col border-r border-gray-100 px-5 py-8 ">
                <div class="text-center">
                    <div class="font-semibold text-2xl text-blue">66</div>
                    <div class="text-gray-500">votes</div>
                </div>
                <div class="mt-8 w-20">
                    <button
                        class="bg-blue text-white py-2 px-4 uppercase rounded-xl text-xxs font-semibold hover:bg-gray-400 transition duration-150 ease-in">voted</button>
                </div>
            </div>
            <div class="flex space-x-6">
                <a href=""><img class="w-20 h-20 rounded-xl" src="https://i.pravatar.cc/20" alt=""></a>
                <div class="container flex flex-col justify-between">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4>
                    <p class="my-6 line-clamp-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum
                        nihil
                        soluta sint
                        nulla quam non rem placeat ab, voluptatum harum saepe dolorem voluptas, accusantium
                        quasi
                        assumenda consequatur aspernatur cupiditate. Hic repudiandae eligendi ratione odit
                        delectus,
                        iure iusto sunt quod sequi qui est, id voluptates, obcaecati nisi temporibus assumenda
                        veritatis
                        veniam ullam! Accusamus tempore numquam quod, voluptate cumque officia, voluptas atque
                        placeat
                        amet animi obcaecati reprehenderit laboriosam. Cum, iste rerum! Repudiandae laborum ex
                        totam
                        error corporis, neque iusto fugiat sunt incidunt cum accusamus asperiores quam excepturi
                        aliquam
                        necessitatibus reiciendis dicta harum quod! Voluptatum vel, beatae voluptatem
                        necessitatibus
                        aspernatur quis maiores nihil.</p>
                    <footer class="flex justify-between items-center mt-6">
                        <footer class="flex space-x-4">
                            <div class="text-gray-400 text-xs">10 hours ago</div>
                            <div>&bull;</div>
                            <div class="text-gray-400 text-xs">Category</div>
                            <div>&bull;</div>
                            <div class="font-semibold text-xs"> 3 comments</div>
                        </footer>
                        <footer class="flex space-x-2" x-data="{ open: false }">
                            <button
                                class="py-3 px-5 rounded-lg text-center font-bold uppercase leading-none w-28 h-7 text-xxs text-white bg-yellow">In
                                Progress</button>
                            <button @click="open = !open" @keydown.escape.window="open=false" @click.away="open=false"
                                class="border rounded-full" class="border rounded-full">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                                <ul x-show="open" x-cloak
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

    </div>
    <div class="my-8">
        {{ $ideas->links() }}
    </div>
</x-app-layout>
