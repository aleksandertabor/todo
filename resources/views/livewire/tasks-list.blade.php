<div class="mt-2 w-full text-center">
    @forelse($this->tasks as $task)
    <livewire:task :task="$task" :key="$task->id . now()"></livewire:task>
    @empty
    <p>No tasks.</p>
    @endforelse
</div>
