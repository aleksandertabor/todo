<?php

namespace App\Http\Livewire;

use App\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class TaskForm extends Component
{
    use AuthorizesRequests;

    public $name;

    public $task;

    protected $rules = ['name' => 'required|string|max:100'];

    private $messages = [
        'name.required' => 'The task :attribute is required.',
    ];

    protected $listeners = [
        'taskEditing' => 'editing',
        'taskRemove' => 'delete',
    ];

    public function editing($taskId)
    {
        $this->task = Task::find($taskId);
        $this->name = $this->task->name;
    }

    public function getIsEditingProperty()
    {
        return $this->task;
    }

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

    public function delete($taskId)
    {
        $task = Task::find($taskId);

        $this->authorize('delete', $task);

        $task->delete();

        $this->emitTo('tasks-list', 'taskRemoved');

        $this->reset();
    }

    public function edit()
    {
        $this->authorize('update', $this->task);

        $this->validateTask();

        $this->task->update(['name' => $this->name]);

        $this->emitTo('tasks-list', 'taskEdited');

        $this->reset();
    }

    public function add()
    {
        $this->authorize('create', Task::class);

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
