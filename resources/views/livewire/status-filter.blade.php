<div>
    <nav class=" hidden md:flex items-center justify-between text-xs text-gray-400">
        <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3">
            <li><a wire:click.prevent="setStatus('All')" href="#"
                    class="border-b-4  pb-3 @if ($status === 'All') border-blue text-gray-900 @endif">All
                    Ideas(87)</a></li>
            <li><a wire:click.prevent="setStatus('Considering')" href="#"
                    class="border-b-4  pb-3 transition duration-150 hover:border-blue ">Considering(6)</a>
            </li>
            <li><a wire:click.prevent="setStatus('In Progress')" href="#"
                    class="border-b-4  pb-3 transition duration-150 hover:border-blue ">In
                    Progress(6)</a>
            </li>

        </ul>
        <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3">
            <li><a wire:click.prevent="setStatus('Implemented')" href="#"
                    class="border-b-4  pb-3 transition duration-150 hover:border-blue">Implemented(10)</a>
            </li>
            <li><a wire:click.prevent="setStatus('Closed')" href="#"
                    class="border-b-4  pb-3 transition duration-150 hover:border-blue ">Closed(20)</a>
            </li>

        </ul>
    </nav>
</div>
