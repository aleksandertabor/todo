<div class="mt-2 w-full text-center">
    @forelse($this->tasks as $task)
    {{ $task }}
    @empty
    <p>No tasks.</p>
    @endforelse
</div>
