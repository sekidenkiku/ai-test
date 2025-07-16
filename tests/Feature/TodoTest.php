<?php

namespace Tests\Feature;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TodoTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_todos_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/todos');

        $response->assertStatus(200);
    }

    public function test_user_can_create_todo(): void
    {
        $user = User::factory()->create();

        $todoData = [
            'title' => 'テストTodo',
            'description' => 'これはテスト用のTodoです',
        ];

        $response = $this->actingAs($user)->post('/todos', $todoData);

        $response->assertRedirect();
        $this->assertDatabaseHas('todos', [
            'title' => 'テストTodo',
            'description' => 'これはテスト用のTodoです',
            'user_id' => $user->id,
            'is_completed' => false,
        ]);
    }

    public function test_user_can_update_todo(): void
    {
        $user = User::factory()->create();
        $todo = Todo::factory()->create(['user_id' => $user->id]);

        $updateData = [
            'title' => '更新されたTodo',
            'description' => '更新された説明',
            'is_completed' => true,
        ];

        $response = $this->actingAs($user)->put("/todos/{$todo->id}", $updateData);

        $response->assertRedirect();
        $this->assertDatabaseHas('todos', [
            'id' => $todo->id,
            'title' => '更新されたTodo',
            'description' => '更新された説明',
            'is_completed' => true,
        ]);
    }

    public function test_user_can_delete_todo(): void
    {
        $user = User::factory()->create();
        $todo = Todo::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->delete("/todos/{$todo->id}");

        $response->assertRedirect();
        $this->assertDatabaseMissing('todos', ['id' => $todo->id]);
    }

    public function test_user_cannot_update_other_users_todo(): void
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $todo = Todo::factory()->create(['user_id' => $user1->id]);

        $response = $this->actingAs($user2)->put("/todos/{$todo->id}", [
            'title' => 'ハッキング試行',
            'description' => '他人のTodoを編集',
            'is_completed' => true,
        ]);

        $response->assertStatus(403);
    }

    public function test_user_cannot_delete_other_users_todo(): void
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $todo = Todo::factory()->create(['user_id' => $user1->id]);

        $response = $this->actingAs($user2)->delete("/todos/{$todo->id}");

        $response->assertStatus(403);
        $this->assertDatabaseHas('todos', ['id' => $todo->id]);
    }

    public function test_title_is_required(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/todos', [
            'description' => '説明のみ',
        ]);

        $response->assertSessionHasErrors(['title']);
    }

    public function test_only_user_todos_are_shown(): void
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        
        $todo1 = Todo::factory()->create(['user_id' => $user1->id, 'title' => 'ユーザー1のTodo']);
        $todo2 = Todo::factory()->create(['user_id' => $user2->id, 'title' => 'ユーザー2のTodo']);

        $response = $this->actingAs($user1)->get('/todos');

        $response->assertStatus(200);
        $response->assertSee('ユーザー1のTodo');
        $response->assertDontSee('ユーザー2のTodo');
    }
}