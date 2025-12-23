<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Order;
use App\Models\Courier;

class CourierApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_and_store_and_show_update_destroy()
    {
        // index initially empty
        $this->getJson('/api/couriers')
            ->assertStatus(200);

        // store
        $payload = ['name' => 'Jean', 'phone' => '77000000', 'vehicle' => 'moto', 'status' => 'available'];
        $resp = $this->postJson('/api/couriers', $payload);
        $resp->assertStatus(201)->assertJsonFragment(['name' => 'Jean']);

        $id = $resp->json('id');

        // show
        $this->getJson("/api/couriers/{$id}")
            ->assertStatus(200)
            ->assertJsonPath('name', 'Jean');

        // update
        $this->putJson("/api/couriers/{$id}", array_merge($payload, ['status' => 'unavailable']))
            ->assertStatus(200)
            ->assertJsonPath('status', 'unavailable');

        // destroy
        $this->deleteJson("/api/couriers/{$id}")
            ->assertStatus(204);

        $this->assertDatabaseMissing('couriers', ['id' => $id]);
    }

    public function test_available_and_assign()
    {
        $order = Order::factory()->create();
        $free = Courier::factory()->create(['status' => 'available', 'order_id' => null]);
        $busy = Courier::factory()->create(['status' => 'unavailable', 'order_id' => 999]);

        // available lists only the free courier
        $this->getJson('/api/couriers/available')
            ->assertStatus(200)
            ->assertJsonFragment(['id' => $free->id])
            ->assertJsonMissing(['id' => $busy->id]);

        // assign
        $this->postJson("/api/couriers/{$free->id}/assign", ['order_id' => $order->id])
            ->assertStatus(200)
            ->assertJsonPath('courier.order_id', $order->id)
            ->assertJsonPath('courier.status', 'unavailable');

        // verify order updated
        $this->assertDatabaseHas('orders', ['id' => $order->id, 'delivery_status' => 'assigned']);
    }

    public function test_assign_conflict_and_errors()
    {
        $order = Order::factory()->create();
        $free = Courier::factory()->create(['status' => 'available', 'order_id' => null]);

        // first assign OK
        $this->postJson("/api/couriers/{$free->id}/assign", ['order_id' => $order->id])->assertStatus(200);

        // second assign should return conflict (409)
        $this->postJson("/api/couriers/{$free->id}/assign", ['order_id' => $order->id])
            ->assertStatus(409);
    }
}