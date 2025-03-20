<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;


class CategoryControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */

     use RefreshDatabase;


        public function test_index_returns_all_categories(): void
        {
            Category::factory()->count(3)->create();

            $response = $this->getJson('/api/categories');

            $response->assertStatus(200)
                     ->assertJsonCount(3);
        }

        public function test_store_creates_new_category(): void
        {
            $data = ['name' => 'New Category'];

            $response = $this->postJson('/api/categories', $data);

            $response->assertStatus(201)
                     ->assertJsonFragment($data);

            $this->assertDatabaseHas('categories', $data);
        }

        public function test_show_returns_category(): void
        {
            $category = Category::factory()->create();

            $response = $this->getJson("/api/categories/{$category->id}");

            $response->assertStatus(200)
                     ->assertJsonFragment(['name' => $category->name]);
        }

        public function test_update_modifies_existing_category(): void
        {
            $category = Category::factory()->create();
            $data = ['name' => 'Updated Category'];

            $response = $this->putJson("/api/categories/{$category->id}", $data);

            $response->assertStatus(200)
                     ->assertJsonFragment($data);

            $this->assertDatabaseHas('categories', $data);
        }

        public function test_destroy_deletes_category(): void
        {
            $category = Category::factory()->create();

            $response = $this->deleteJson("/api/categories/{$category->id}");

            $response->assertStatus(200)
                     ->assertJsonFragment(['message' => 'category deleted']);

            $this->assertDatabaseMissing('categories', ['id' => $category->id]);
        }
    }
    
