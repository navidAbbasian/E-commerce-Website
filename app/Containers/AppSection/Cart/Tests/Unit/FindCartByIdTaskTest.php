<?php

namespace App\Containers\AppSection\Cart\Tests\Unit;

use App\Containers\AppSection\Cart\Events\CartFoundByIdEvent;
use App\Containers\AppSection\Cart\Models\Cart;
use App\Containers\AppSection\Cart\Tasks\FindCartByIdTask;
use App\Containers\AppSection\Cart\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindCartByIdTaskTest.
 *
 * @group cart
 * @group unit
 */
class FindCartByIdTaskTest extends UnitTestCase
{
    public function testFindCartById(): void
    {
        Event::fake();
        $cart = Cart::factory()->create();

        $foundCart = app(FindCartByIdTask::class)->run($cart->id);

        $this->assertEquals($cart->id, $foundCart->id);
        Event::assertDispatched(CartFoundByIdEvent::class);
    }

    public function testFindCartWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindCartByIdTask::class)->run($noneExistingId);
    }
}
