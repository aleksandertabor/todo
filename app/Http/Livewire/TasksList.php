<?php

namespace App\Http\Livewire;

use App\Task;
use Livewire\Component;

class TasksList extends Component
{
    public function getTasksProperty()
    {
        return Task::latest()->get();
    }

    public function render()
    {
        return view('livewire.tasks-list');
    }
}
