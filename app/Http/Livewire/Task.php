<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Task extends Component
{
    public $task;

    public function mount(\App\Task $task)
    {
        $this->task = $task;
    }

    public function complete()
    {
        $this->task->toggleCompletion();
    }

    public function inProgress()
    {
        $this->task->toggleInProgress();
    }

    public function render()
    {
        return view('livewire.task');
    }
}
