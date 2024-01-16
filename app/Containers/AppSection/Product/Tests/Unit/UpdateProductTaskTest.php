<?php

namespace App\Containers\AppSection\Product\Tests\Unit;

use App\Containers\AppSection\Product\Events\ProductUpdatedEvent;
use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\Product\Tasks\UpdateProductTask;
use App\Containers\AppSection\Product\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class UpdateProductTaskTest.
 *
 * @group product
 * @group unit
 */
class UpdateProductTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateProduct(): void
    {
        Event::fake();
        $product = Product::factory()->create();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedProduct = app(UpdateProductTask::class)->run($data, $product->id);

        $this->assertEquals($product->id, $updatedProduct->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedProduct->some_field);
        Event::assertDispatched(ProductUpdatedEvent::class);
    }

    public function testUpdateProductWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateProductTask::class)->run([], $noneExistingId);
    }
}
