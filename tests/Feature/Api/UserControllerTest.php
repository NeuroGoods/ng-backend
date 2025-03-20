<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase; // Ensures a clean database for each test

    public function test_can_list_users()
    {
        User::factory()->count(3)->create();

        $response = $this->getJson('/api/users');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    public function test_can_create_user()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password'),
        ];

        $response = $this->postJson('/api/users', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment(['name' => 'John Doe']);

        $this->assertDatabaseHas('users', ['email' => 'johndoe@example.com']);
    }

    public function test_can_show_user()
    {
        $user = User::factory()->create();

        $response = $this->getJson("/api/users/{$user->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => $user->name]);
    }

    public function test_can_update_user()
    {
        $user = User::factory()->create();
        $newData = ['name' => 'Updated Name', 'email' => 'updated@example.com'];

        $response = $this->putJson("/api/users/{$user->id}", $newData);

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => 'Updated Name']);

        $this->assertDatabaseHas('users', $newData);
    }

    public function test_can_delete_user()
    {
        $user = User::factory()->create();

        $response = $this->deleteJson("/api/users/{$user->id}");

        $response->assertStatus(200)
                 ->assertJson(['message' => 'User deleted']);

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    public function test_can_order_product()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create(['price' => 100]);

        $response = $this->postJson("/api/users/{$user->id}/order/{$product->id}");

        $response->assertStatus(201)
                 ->assertJsonFragment(['status' => 'pending']);

        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'total' => 100,
            'status' => 'pending'
        ]);
    }
}
