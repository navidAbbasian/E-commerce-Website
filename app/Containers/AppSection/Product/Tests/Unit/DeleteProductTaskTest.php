<?php

namespace App\Containers\AppSection\Product\Tests\Unit;

use App\Containers\AppSection\Product\Events\ProductDeletedEvent;
use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\Product\Tasks\DeleteProductTask;
use App\Containers\AppSection\Product\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class DeleteProductTaskTest.
 *
 * @group product
 * @group unit
 */
class DeleteProductTaskTest extends UnitTestCase
{
    public function testDeleteProduct(): void
    {
        Event::fake();
        $product = Product::factory()->create();

        $result = app(DeleteProductTask::class)->run($product->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(ProductDeletedEvent::class);
    }

    public function testDeleteProductWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteProductTask::class)->run($noneExistingId);
    }
}
