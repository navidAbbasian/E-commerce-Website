<?php

namespace App\Containers\AppSection\Cart\Tests\Unit;

use App\Containers\AppSection\Cart\Events\CartUpdatedEvent;
use App\Containers\AppSection\Cart\Models\Cart;
use App\Containers\AppSection\Cart\Tasks\UpdateCartTask;
use App\Containers\AppSection\Cart\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class UpdateCartTaskTest.
 *
 * @group cart
 * @group unit
 */
class UpdateCartTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateCart(): void
    {
        Event::fake();
        $cart = Cart::factory()->create();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedCart = app(UpdateCartTask::class)->run($data, $cart->id);

        $this->assertEquals($cart->id, $updatedCart->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedCart->some_field);
        Event::assertDispatched(CartUpdatedEvent::class);
    }

    public function testUpdateCartWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateCartTask::class)->run([], $noneExistingId);
    }
}
