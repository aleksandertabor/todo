<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TaskForm extends Component
{
    public $name;

    private $rules = ['name' => 'required|string|max:100'];

    private $messages = [
        'name.required' => 'The task :attribute is required.',
    ];

    public function updated($field)
    {
        $this->validateOnly(
            $field,
            $this->rules,
            $this->messages,
        );
    }

    public function validateTask()
    {
        $this->validate(
            $this->rules,
            $this->messages
        );
    }

    public function add()
    {
        $this->validateTask();

        auth()->user()->tasks()->create([
            'name' => $this->name,
        ]);

        $this->emitTo('tasks-list', 'taskAdded');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.task-form');
    }
}
