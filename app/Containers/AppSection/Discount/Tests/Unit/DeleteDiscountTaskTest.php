<?php

namespace App\Containers\AppSection\Discount\Tests\Unit;

use App\Containers\AppSection\Discount\Events\DiscountDeletedEvent;
use App\Containers\AppSection\Discount\Models\Discount;
use App\Containers\AppSection\Discount\Tasks\DeleteDiscountTask;
use App\Containers\AppSection\Discount\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class DeleteDiscountTaskTest.
 *
 * @group discount
 * @group unit
 */
class DeleteDiscountTaskTest extends UnitTestCase
{
    public function testDeleteDiscount(): void
    {
        Event::fake();
        $discount = Discount::factory()->create();

        $result = app(DeleteDiscountTask::class)->run($discount->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(DiscountDeletedEvent::class);
    }

    public function testDeleteDiscountWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteDiscountTask::class)->run($noneExistingId);
    }
}
