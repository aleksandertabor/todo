<?php

namespace App\Http\Livewire;

use App\Task;
use Livewire\Component;

class EditTask extends Component
{
    public $task;

    public function mount(Task $task)
    {
        $this->task = $task;
    }

    public function render()
    {
        return <<<'blade'
            <button
            class="btn-todo btn-purple mb-2 sm:mb-0 mr-2"
            wire:click.stop="$emitTo('task-form', 'taskEditing', {{$this->task->id}})">
                <x-icons.edit></x-icons.edit>
            </button>
        blade;
    }
}
