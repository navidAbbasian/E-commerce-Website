<?php

namespace App\Containers\AppSection\Order\Tests\Unit;

use App\Containers\AppSection\Order\Events\OrdersListedEvent;
use App\Containers\AppSection\Order\Models\Order;
use App\Containers\AppSection\Order\Tasks\GetAllOrdersTask;
use App\Containers\AppSection\Order\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllOrdersTaskTest.
 *
 * @group order
 * @group unit
 */
class GetAllOrdersTaskTest extends UnitTestCase
{
    public function testGetAllOrders(): void
    {
        Event::fake();
        Order::factory()->count(3)->create();

        $foundOrders = app(GetAllOrdersTask::class)->run();

        $this->assertCount(3, $foundOrders);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundOrders);
        Event::assertDispatched(OrdersListedEvent::class);
    }
}
