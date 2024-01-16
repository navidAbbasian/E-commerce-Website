<?php

namespace App\Containers\AppSection\Discount\Tests\Unit;

use App\Containers\AppSection\Discount\Events\DiscountCreatedEvent;
use App\Containers\AppSection\Discount\Tasks\CreateDiscountTask;
use App\Containers\AppSection\Discount\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateDiscountTaskTest.
 *
 * @group discount
 * @group unit
 */
class CreateDiscountTaskTest extends UnitTestCase
{
    public function testCreateDiscount(): void
    {
        Event::fake();
        $data = [];

        $discount = app(CreateDiscountTask::class)->run($data);

        $this->assertModelExists($discount);
        Event::assertDispatched(DiscountCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateDiscountWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateDiscountTask::class)->run($data);
//    }
}
