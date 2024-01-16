<?php

namespace App\Containers\AppSection\Cart\Tests\Unit;

use App\Containers\AppSection\Cart\Events\CartsListedEvent;
use App\Containers\AppSection\Cart\Models\Cart;
use App\Containers\AppSection\Cart\Tasks\GetAllCartsTask;
use App\Containers\AppSection\Cart\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllCartsTaskTest.
 *
 * @group cart
 * @group unit
 */
class GetAllCartsTaskTest extends UnitTestCase
{
    public function testGetAllCarts(): void
    {
        Event::fake();
        Cart::factory()->count(3)->create();

        $foundCarts = app(GetAllCartsTask::class)->run();

        $this->assertCount(3, $foundCarts);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundCarts);
        Event::assertDispatched(CartsListedEvent::class);
    }
}
