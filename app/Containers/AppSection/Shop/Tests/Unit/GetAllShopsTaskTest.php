<?php

namespace App\Containers\AppSection\Shop\Tests\Unit;

use App\Containers\AppSection\Shop\Events\ShopsListedEvent;
use App\Containers\AppSection\Shop\Models\Shop;
use App\Containers\AppSection\Shop\Tasks\GetAllShopsTask;
use App\Containers\AppSection\Shop\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllShopsTaskTest.
 *
 * @group shop
 * @group unit
 */
class GetAllShopsTaskTest extends UnitTestCase
{
    public function testGetAllShops(): void
    {
        Event::fake();
        Shop::factory()->count(3)->create();

        $foundShops = app(GetAllShopsTask::class)->run();

        $this->assertCount(3, $foundShops);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundShops);
        Event::assertDispatched(ShopsListedEvent::class);
    }
}
