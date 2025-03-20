<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_category()
    {
        $category = Category::create(['name' => 'Electronics']);

        $this->assertDatabaseHas('categories', ['name' => 'Electronics']);
    }

    public function test_category_has_many_products()
    {
        $category = Category::factory()->create();
        $product1 = Product::factory()->create(['category_id' => $category->id]);
        $product2 = Product::factory()->create(['category_id' => $category->id]);

        $this->assertCount(2, $category->products);
    }
}
