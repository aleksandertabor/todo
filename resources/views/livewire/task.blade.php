<div class="flex flex-wrap md:flex-no-wrap justify-between items-center mt-4 pb-6 relative">
    <span class="mr-6 absolute top-8px left-15" style=" top: -8px; left: 15px;">
        <span class="flex-shrink-0
            {{ $task->isCompleted() ? 'btn-green' : 'btn-gray' }}
            {{ !$task->isInProgress() ?: 'btn-orange' }}
            text-sm border-4 text-white py-1 px-2 rounded no-underline">
            {{ $task->status }}
        </span>
    </span>
    <div class="group w-full transition duration-500 ease-in-out border-2 flex flex-wrap justify-between items-center p-3 pt-6 hover:bg-gray-300 cursor-pointer {{ !$task->isCompleted() ?: 'border-green-600'}} {{ !$task->isInProgress() ?: 'border-orange-300' }}"
        wire:click="complete">

        <span class="flex flex-col w-3/6 sm:flex-row items-center sm:items-start text-left">
            <span class="{{ !$task->isCompleted() ?: 'line-through'}}">{{ $task->name }}</span>
        </span>
        <div
            class="w-2/6 transition duration-500 ease-in-out flex justify-end flex-row flex-wrap mt-2 sm:mt-0 opacity-0 group-hover:opacity">
            <button class="btn-todo btn-orange mb-2 sm:mb-0 mr-2" wire:click.stop="inProgress">
                In Progress
            </button>

            <livewire:edit-task :task="$task"></livewire:edit-task>
            <livewire:delete-task :task="$task"></livewire:delete-task>
        </div>
    </div>
</div>
