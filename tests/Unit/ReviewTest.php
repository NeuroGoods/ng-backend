<?php

namespace Tests\Unit;

use App\Models\Review;
use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReviewTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_review()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();

        $review = Review::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'comment' => 'Great product!',
            'rating' => 5,
        ]);

        $this->assertDatabaseHas('reviews', ['comment' => 'Great product!']);
    }

    public function test_review_belongs_to_user_and_product()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();
        $review = Review::factory()->create(['user_id' => $user->id, 'product_id' => $product->id]);

        $this->assertTrue($review->user->is($user));
        $this->assertTrue($review->product->is($product));
    }
}
