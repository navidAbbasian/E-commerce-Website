<?php

namespace App\Containers\AppSection\Cart\Tests\Unit;

use App\Containers\AppSection\Cart\Events\CartCreatedEvent;
use App\Containers\AppSection\Cart\Tasks\CreateCartTask;
use App\Containers\AppSection\Cart\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateCartTaskTest.
 *
 * @group cart
 * @group unit
 */
class CreateCartTaskTest extends UnitTestCase
{
    public function testCreateCart(): void
    {
        Event::fake();
        $data = [];

        $cart = app(CreateCartTask::class)->run($data);

        $this->assertModelExists($cart);
        Event::assertDispatched(CartCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateCartWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateCartTask::class)->run($data);
//    }
}
