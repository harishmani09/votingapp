<x-app-layout>
    <div class="filters flex space-x-6">
        <div class="w-1/3">
            <select name="category" id="category" class="w-full rounded-xl py-2 px-4 border-none">
                <option value="category" class="">Category</option>
                <option value="category-one" class="">Category One</option>
                <option value="category-two" class="">Category Two</option>
                <option value="category-three" class="">Category Three</option>
            </select>
        </div>
        <div class="w-1/3">
            <select name="other_filter" id="other_filter" class="w-full rounded-xl py-2 px-4 border-none">
                <option value="category" class="">Category</option>
                <option value="category-one" class="">Category One</option>
                <option value="category-two" class="">Category Two</option>
                <option value="category-three" class="">Category Three</option>
            </select>
        </div>
        <div class="w-2/3 relative">

            <input type="search" placeholder="find an idea..."
                class="border-none rounded-xl w-full px-4 py-2 placeholder-gray-900 ">
            <div class="absolute  flex items-center top-0 h-full ">
                <svg class="w-4 h-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>

            </div>
        </div>

    </div> <!-- end of filters  -->
</x-app-layout>
