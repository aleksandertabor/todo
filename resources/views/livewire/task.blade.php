<div class="flex flex-wrap md:flex-no-wrap justify-between items-center mt-4 pb-6 relative">
    <span class="mr-6 absolute z-10 top-8px left-15" style=" top: -8px; left: 15px;">
        <span class="flex-shrink-0
            {{ $task->isCompleted() ? 'btn-green' : 'btn-gray' }}
            {{ !$task->isInProgress() ?: 'btn-orange' }}
            text-sm border-4 text-white py-1 px-2 rounded no-underline">
            {{ $task->status }}
        </span>
    </span>
    <div class="relative task w-full transition duration-500 ease-in-out border-2 flex flex-wrap justify-between items-center p-3 pt-6 hover:bg-gray-300 cursor-pointer {{ !$task->isCompleted() ?: 'border-green-600'}} {{ !$task->isInProgress() ?: 'border-orange-300' }}"
        wire:click="complete">

        <span class="flex sm:flex-row items-center text-left pb-2">
            <span class="flex-shrink-0">
                @if ($task->isCompleted())
                <x-icons.happy></x-icons.happy>
                @elseif($task->isInProgress())
                <x-icons.clock></x-icons.clock>
                @else
                <x-icons.sad></x-icons.sad>
                @endif
            </span>
            <span class="ml-2 {{ !$task->isCompleted() ?: 'line-through'}}">{{ $task->name }}</span>
        </span>
        <div class="absolute transition duration-500 ease-in-out flex justify-end flex-row flex-wrap mt-2 mb-2 sm:mt-0 actions opacity-0 h-0"
            style="right: 15px; bottom: 10px;">
            <button class="btn-todo btn-orange mb-2 sm:mb-0 mr-2" wire:click.stop="inProgress">
                <x-icons.clock></x-icons.clock>
            </button>

            <livewire:edit-task :task="$task"></livewire:edit-task>
            <livewire:delete-task :task="$task"></livewire:delete-task>
        </div>
    </div>
</div>
