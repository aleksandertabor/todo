<div class="flex flex-wrap md:flex-no-wrap justify-between items-center mt-4">
    <div class="task w-full transition duration-500 ease-in-out border-2 flex flex-wrap justify-between items-center p-3 hover:bg-gray-300 cursor-pointer {{ !$task->isCompleted() ?: 'border-green-600'}}"
        wire:click="complete">

        <span class="flex flex-col sm:flex-row items-center sm:items-start m-2">
            <span class="ml-0 sm:ml-2 {{ !$task->isCompleted() ?: 'line-through'}}">{{ $task->name }}</span>
        </span>

        <span>
            <span class="flex-shrink-0
                {{ $task->isCompleted() ? 'completed' : 'pending' }}
                text-sm border-4 text-white py-1 px-2 rounded no-underline">
                {{ $task->status }}
            </span>
        </span>

    </div>
</div>
