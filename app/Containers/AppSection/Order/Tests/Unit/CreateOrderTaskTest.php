<?php

namespace App\Containers\AppSection\Order\Tests\Unit;

use App\Containers\AppSection\Order\Events\OrderCreatedEvent;
use App\Containers\AppSection\Order\Tasks\CreateOrderTask;
use App\Containers\AppSection\Order\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateOrderTaskTest.
 *
 * @group order
 * @group unit
 */
class CreateOrderTaskTest extends UnitTestCase
{
    public function testCreateOrder(): void
    {
        Event::fake();
        $data = [];

        $order = app(CreateOrderTask::class)->run($data);

        $this->assertModelExists($order);
        Event::assertDispatched(OrderCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateOrderWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateOrderTask::class)->run($data);
//    }
}
