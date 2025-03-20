<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_product()
    {
        $category = Category::factory()->create();

        $product = Product::create([
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 9.99,
            'stock' => 10,
            'image' => 'test.jpg',
            'category_id' => $category->id,
        ]);

        $this->assertDatabaseHas('products', ['name' => 'Test Product']);
    }

    public function test_product_belongs_to_category()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create(['category_id' => $category->id]);

        $this->assertTrue($product->category->is($category));
    }
}
