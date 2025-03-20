<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanListAllProducts()
    {
        Product::factory()->count(3)->create();

        $response = $this->getJson('/api/products');

        $response->assertOk()
            ->assertJsonCount(3)
            ->assertJsonStructure([
                '*' => ['id', 'name', 'description', 'price', 'stock', 'image', 'category_id']
            ]);
    }

    public function testItCanCreateProduct()
    {


        $category = \App\Models\Category::factory()->create();

        $productData = [
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 9.9,
            'stock' => 5,
            'image' => 'test.jpg',
            'category_id' => $category->id, // Use the generated category ID
        ];

        $response = $this->postJson('/api/products', $productData);

        $response->assertStatus(201);
        $this->assertDatabaseHas('products', ['name' => 'Test Product']);
    }


    public function testItCanShowProduct()
    {
        $product = Product::factory()->create();

        $response = $this->getJson("/api/products/{$product->id}");

        $response->assertOk()
            ->assertJson($product->toArray());
    }



    public function testItCanUpdateProduct()
    {
        $category = \App\Models\Category::factory()->create();
        $product = Product::factory()->create();

        $updateData = [
            'name' => 'Updated Product',
            'description' => 'Updated Description',
            'price' => 199.99,
            'category_id' => $category->id,
        ];

        $response = $this->putJson("/api/products/{$product->id}", $updateData);

        $response->assertOk()
            ->assertJson($updateData);

        $this->assertDatabaseHas('products', $updateData);
    }





    public function testItReturns404WhenUpdatingNonExistentProduct()
    {
        $response = $this->putJson('/api/products/999', [
            'name' => 'Test'
        ]);

        $response->assertNotFound();
    }

    public function testItCanDeleteProduct()
    {
        $product = Product::factory()->create();

        $response = $this->deleteJson("/api/products/{$product->id}");

        $response->assertOk()
            ->assertJson(['message' => 'Product deleted']);

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }


}
