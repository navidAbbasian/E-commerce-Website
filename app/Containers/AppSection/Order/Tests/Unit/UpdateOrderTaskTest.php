<?php

namespace App\Containers\AppSection\Order\Tests\Unit;

use App\Containers\AppSection\Order\Events\OrderUpdatedEvent;
use App\Containers\AppSection\Order\Models\Order;
use App\Containers\AppSection\Order\Tasks\UpdateOrderTask;
use App\Containers\AppSection\Order\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class UpdateOrderTaskTest.
 *
 * @group order
 * @group unit
 */
class UpdateOrderTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateOrder(): void
    {
        Event::fake();
        $order = Order::factory()->create();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedOrder = app(UpdateOrderTask::class)->run($data, $order->id);

        $this->assertEquals($order->id, $updatedOrder->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedOrder->some_field);
        Event::assertDispatched(OrderUpdatedEvent::class);
    }

    public function testUpdateOrderWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateOrderTask::class)->run([], $noneExistingId);
    }
}
