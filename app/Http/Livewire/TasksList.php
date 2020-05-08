<?php

namespace App\Http\Livewire;

use App\Task;
use Livewire\Component;

class TasksList extends Component
{
    protected $listeners = [
        'taskAdded' => '$refresh',
    ];

    public function getTasksProperty()
    {
        return Task::latest()->get();
    }

    public function render()
    {
        return view('livewire.tasks-list');
    }
}
