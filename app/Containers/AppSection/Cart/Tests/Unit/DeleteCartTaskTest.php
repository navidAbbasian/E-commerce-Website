<?php

namespace App\Containers\AppSection\Cart\Tests\Unit;

use App\Containers\AppSection\Cart\Events\CartDeletedEvent;
use App\Containers\AppSection\Cart\Models\Cart;
use App\Containers\AppSection\Cart\Tasks\DeleteCartTask;
use App\Containers\AppSection\Cart\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class DeleteCartTaskTest.
 *
 * @group cart
 * @group unit
 */
class DeleteCartTaskTest extends UnitTestCase
{
    public function testDeleteCart(): void
    {
        Event::fake();
        $cart = Cart::factory()->create();

        $result = app(DeleteCartTask::class)->run($cart->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(CartDeletedEvent::class);
    }

    public function testDeleteCartWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteCartTask::class)->run($noneExistingId);
    }
}
