<?php

namespace App\Containers\AppSection\Discount\Tests\Unit;

use App\Containers\AppSection\Discount\Events\DiscountsListedEvent;
use App\Containers\AppSection\Discount\Models\Discount;
use App\Containers\AppSection\Discount\Tasks\GetAllDiscountsTask;
use App\Containers\AppSection\Discount\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllDiscountsTaskTest.
 *
 * @group discount
 * @group unit
 */
class GetAllDiscountsTaskTest extends UnitTestCase
{
    public function testGetAllDiscounts(): void
    {
        Event::fake();
        Discount::factory()->count(3)->create();

        $foundDiscounts = app(GetAllDiscountsTask::class)->run();

        $this->assertCount(3, $foundDiscounts);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundDiscounts);
        Event::assertDispatched(DiscountsListedEvent::class);
    }
}
