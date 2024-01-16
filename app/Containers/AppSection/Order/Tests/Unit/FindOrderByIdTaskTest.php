<?php

namespace App\Containers\AppSection\Order\Tests\Unit;

use App\Containers\AppSection\Order\Events\OrderFoundByIdEvent;
use App\Containers\AppSection\Order\Models\Order;
use App\Containers\AppSection\Order\Tasks\FindOrderByIdTask;
use App\Containers\AppSection\Order\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindOrderByIdTaskTest.
 *
 * @group order
 * @group unit
 */
class FindOrderByIdTaskTest extends UnitTestCase
{
    public function testFindOrderById(): void
    {
        Event::fake();
        $order = Order::factory()->create();

        $foundOrder = app(FindOrderByIdTask::class)->run($order->id);

        $this->assertEquals($order->id, $foundOrder->id);
        Event::assertDispatched(OrderFoundByIdEvent::class);
    }

    public function testFindOrderWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindOrderByIdTask::class)->run($noneExistingId);
    }
}
