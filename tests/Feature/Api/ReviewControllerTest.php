<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\User;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReviewControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function testCanListReviews()
    {
        Review::factory()->count(3)->create();

        $response = $this->getJson('/api/reviews');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    public function test_can_create_review()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();

        $data = [
            'user_id' => $user->id,
            'product_id' => $product->id,
            'comment' => 'Great product!',
            'rating' => 5,
        ];

        $response = $this->postJson('/api/reviews', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment(['comment' => 'Great product!']);

        $this->assertDatabaseHas('reviews', $data);
    }

    public function test_can_show_review()
    {
        $review = Review::factory()->create();

        $response = $this->getJson("/api/reviews/{$review->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['comment' => $review->comment]);
    }

    public function test_can_update_review()
    {
        $review = Review::factory()->create();
    
        $newData = [
            'user_id' => $review->user_id,  // Keep the existing user
            'product_id' => $review->product_id,  // Keep the existing product
            'comment' => 'Updated comment!',
            'rating' => 4
        ];
    
        $response = $this->putJson("/api/reviews/{$review->id}", $newData);
    
        $response->assertStatus(200)
                 ->assertJsonFragment(['comment' => 'Updated comment!']);
    
        $this->assertDatabaseHas('reviews', $newData);
    }
    

    public function test_can_delete_review()
    {
        $review = Review::factory()->create();

        $response = $this->deleteJson("/api/reviews/{$review->id}");

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Review deleted']);

        $this->assertDatabaseMissing('reviews', ['id' => $review->id]);
    }
}
