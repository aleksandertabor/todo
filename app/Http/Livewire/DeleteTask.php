<?php

namespace App\Http\Livewire;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class DeleteTask extends Component
{
    use AuthorizesRequests;

    public $task;

    public function mount(\App\Task $task)
    {
        $this->task = $task;
    }

    public function render()
    {
        return <<<'blade'
                <button class="btn-todo btn-red mb-2 sm:mb-0"
                wire:click.stop="$emitTo('task-form', 'taskRemove', {{$this->task->id}})" wire:loading.attr="disabled">
                    <x-icons.trash></x-icons.trash>
                </button>
        blade;
    }
}
