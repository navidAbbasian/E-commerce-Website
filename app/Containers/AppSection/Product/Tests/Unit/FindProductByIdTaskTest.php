<?php

namespace App\Containers\AppSection\Product\Tests\Unit;

use App\Containers\AppSection\Product\Events\ProductFoundByIdEvent;
use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\Product\Tasks\FindProductByIdTask;
use App\Containers\AppSection\Product\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindProductByIdTaskTest.
 *
 * @group product
 * @group unit
 */
class FindProductByIdTaskTest extends UnitTestCase
{
    public function testFindProductById(): void
    {
        Event::fake();
        $product = Product::factory()->create();

        $foundProduct = app(FindProductByIdTask::class)->run($product->id);

        $this->assertEquals($product->id, $foundProduct->id);
        Event::assertDispatched(ProductFoundByIdEvent::class);
    }

    public function testFindProductWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindProductByIdTask::class)->run($noneExistingId);
    }
}
