<?php

namespace App\Containers\AppSection\Product\Tests\Unit;

use App\Containers\AppSection\Product\Events\ProductCreatedEvent;
use App\Containers\AppSection\Product\Tasks\CreateProductTask;
use App\Containers\AppSection\Product\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateProductTaskTest.
 *
 * @group product
 * @group unit
 */
class CreateProductTaskTest extends UnitTestCase
{
    public function testCreateProduct(): void
    {
        Event::fake();
        $data = [];

        $product = app(CreateProductTask::class)->run($data);

        $this->assertModelExists($product);
        Event::assertDispatched(ProductCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateProductWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateProductTask::class)->run($data);
//    }
}
