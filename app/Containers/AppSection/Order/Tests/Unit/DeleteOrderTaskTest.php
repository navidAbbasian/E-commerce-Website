<?php

namespace App\Containers\AppSection\Order\Tests\Unit;

use App\Containers\AppSection\Order\Events\OrderDeletedEvent;
use App\Containers\AppSection\Order\Models\Order;
use App\Containers\AppSection\Order\Tasks\DeleteOrderTask;
use App\Containers\AppSection\Order\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class DeleteOrderTaskTest.
 *
 * @group order
 * @group unit
 */
class DeleteOrderTaskTest extends UnitTestCase
{
    public function testDeleteOrder(): void
    {
        Event::fake();
        $order = Order::factory()->create();

        $result = app(DeleteOrderTask::class)->run($order->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(OrderDeletedEvent::class);
    }

    public function testDeleteOrderWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteOrderTask::class)->run($noneExistingId);
    }
}
