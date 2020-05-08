<?php

namespace Tests\Feature;

use App\Http\Livewire\TaskForm;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ValidationTaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function name_is_required()
    {
        $this->actingAs(factory(User::class)->create());

        Livewire::test(TaskForm::class)
                 ->set('name', '')
                 ->call('validateTask')
                 ->assertHasErrors(['name' => 'required']);
    }

    /** @test  */
    public function name_is_limited_to_one_hundred_characters()
    {
        $this->actingAs(factory(User::class)->create());

        Livewire::test(TaskForm::class)
                 ->set('name', 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.')
                 ->call('validateTask')
                 ->assertHasErrors(['name' => 'max']);
    }
}
