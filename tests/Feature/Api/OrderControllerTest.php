<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Order;

class OrderControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;




        public function test_index()
        {
            Order::factory()->count(3)->create();

            $response = $this->getJson('/api/orders');

            $response->assertStatus(200)
                     ->assertJsonCount(3);
        }

        public function test_store()
        {
            $user = \App\Models\User::factory()->create();
            $data = [
                'user_id' => $user->id,
                'total' => 100,
                'status' => 'pending',
            ];

            $response = $this->postJson('/api/orders', $data);

            $response->assertStatus(201)
                     ->assertJsonFragment($data);
        }

        public function test_show()
        {
            $order = Order::factory()->create();

            $response = $this->getJson('/api/orders/' . $order->id);

            $response->assertStatus(200)
                     ->assertJson($order->toArray());
        }

        public function test_update()
        {
            $user = \App\Models\User::factory()->create();
            $order = Order::factory()->create();

            $data = [
                'user_id' => $user->id,
                'total' => 200,
                'status' => 'shipped',
            ];

            $response = $this->putJson('/api/orders/' . $order->id, $data);

            $response->assertStatus(200)
                     ->assertJsonFragment($data);
        }

        public function test_destroy()
        {
            $order = Order::factory()->create();

            $response = $this->deleteJson('/api/orders/' . $order->id);

            $response->assertStatus(200)
                     ->assertJson(['message' => 'Order deleted']);

            $this->assertDatabaseMissing('orders', ['id' => $order->id]);
        }
    }
