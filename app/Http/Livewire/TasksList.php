<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TasksList extends Component
{
    protected $listeners = [
        'taskAdded' => '$refresh',
        'taskRemoved' => '$refresh',
    ];

    public function getTasksProperty()
    {
        return auth()->user()->tasks;
    }

    public function render()
    {
        return view('livewire.tasks-list');
    }
}
