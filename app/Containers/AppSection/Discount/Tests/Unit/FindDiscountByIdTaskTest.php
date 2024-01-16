<?php

namespace App\Containers\AppSection\Discount\Tests\Unit;

use App\Containers\AppSection\Discount\Events\DiscountFoundByIdEvent;
use App\Containers\AppSection\Discount\Models\Discount;
use App\Containers\AppSection\Discount\Tasks\FindDiscountByIdTask;
use App\Containers\AppSection\Discount\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindDiscountByIdTaskTest.
 *
 * @group discount
 * @group unit
 */
class FindDiscountByIdTaskTest extends UnitTestCase
{
    public function testFindDiscountById(): void
    {
        Event::fake();
        $discount = Discount::factory()->create();

        $foundDiscount = app(FindDiscountByIdTask::class)->run($discount->id);

        $this->assertEquals($discount->id, $foundDiscount->id);
        Event::assertDispatched(DiscountFoundByIdEvent::class);
    }

    public function testFindDiscountWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindDiscountByIdTask::class)->run($noneExistingId);
    }
}
