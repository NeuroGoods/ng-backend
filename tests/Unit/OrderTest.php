<?php

namespace Tests\Unit;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_order()
    {
        $user = User::factory()->create();

        $order = Order::create([
            'user_id' => $user->id,
            'total' => 150.50,
            'status' => 'pending',
        ]);

        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'total' => 150.50,
            'status' => 'pending',
        ]);
    }

    public function test_order_belongs_to_user()
    {
        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id]);

        $this->assertTrue($order->user->is($user));
    }
}
