<?php

use Illuminate\Foundation\Testing\RefreshDatabase;


uses(Tests\TestCase::class, RefreshDatabase::class);

/*it('it can create a company', function () {
});*/

/*it('it can fetch a to-do', function () {
    $todo = Todo::factory()->create();

    $response = $this->getJson("/api/todos/{$todo->id}");

    $data = [
        'message' => 'Retrieved To-do',
        'todo' => [
            'id' => $todo->id,
            'name' => $todo->name,
            'completed' => $todo->completed,
        ]
    ];

    $response->assertStatus(200)->assertJson($data);
});

it('it can update a to-do', function () {
    $todo = Todo::factory()->create();
    $updatedTodo = ['name' => 'Updated To-do'];
    $response = $this->putJson("/api/todos/{$todo->id}", $updatedTodo);
    $response->assertStatus(200)->assertJson(['message' => 'To-do has been updated']);
    $this->assertDatabaseHas('todos', $updatedTodo);
});

it('it can delete a to-do', function () {
    $todo = Todo::factory()->create();
    $response = $this->deleteJson("/api/todos/{$todo->id}");
    $response->assertStatus(200)->assertJson(['message' => 'To-do has been deleted']);
    $this->assertCount(0, Todo::all());
});*/
