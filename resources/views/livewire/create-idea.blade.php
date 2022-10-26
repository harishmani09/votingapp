<div>

    <form wire:submit.prevent="createIdea" action="#" class="space-y-4 py-6 px-4">
        @csrf
        <div>
            <input wire:model.defer="title" type="text" placeholder="your idea..."
                class="w-full bg-gray-100 border-none rounded-xl placeholder-gray-900 px-4   py-6 text-xs">
            @error('title')
                <p class="text-red text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <select wire:model.defer="category" id="category_add"
                class="w-full rounded-xl py-2 px-4 bg-gray-100 border-none text-xs">

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" class="">{{ $category->name }}</option>
                @endforeach
                @error('category')
                    <p class="text-red text-xs mt-2">{{ $message }}</p>
                @enderror
            </select>
        </div>
        <div>
            <textarea wire:model.defer="description" id="description" cols="25" rows="5"
                class="border-none bg-gray-100 text-gray-500 w-full rounded-xl" placeholder="describe your idea here..."></textarea>
            @error('description')
                <p class="text-red text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-between space-x-4 items-center">
            <button type="button"
                class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in">
                <span class="ml-2">Attach</span>
                <span><svg class="w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                    </svg>
                </span>
            </button>
            <button type="submit"
                class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in text-white">

                Submit
            </button>
        </div>
        <div>
            @if (session('success_message'))
                <div x-data="{ isVisible: true }" x-init="setTimeout(() => {
                    isVisible = false
                }, 3000)" x-show="isVisible" class="text-green mt-4 ">
                    {{ session('success_message') }}
                </div>
            @endif
        </div>
    </form>
</div>


{{-- 8756981895 --}}
