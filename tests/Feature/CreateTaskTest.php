<?php

namespace Tests\Feature;

use App\Http\Livewire\TaskForm;
use App\Task;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CreateTaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function can_add_task()
    {
        $this->actingAs(factory(User::class)->create());

        Livewire::test(TaskForm::class)
             ->set('name', 'Read a book.')
             ->call('add');

        $this->assertTrue(Task::whereName('Read a book.')->exists());
    }
}
