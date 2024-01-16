<?php

namespace App\Containers\AppSection\Product\Tests\Unit;

use App\Containers\AppSection\Product\Events\ProductsListedEvent;
use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\Product\Tasks\GetAllProductsTask;
use App\Containers\AppSection\Product\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllProductsTaskTest.
 *
 * @group product
 * @group unit
 */
class GetAllProductsTaskTest extends UnitTestCase
{
    public function testGetAllProducts(): void
    {
        Event::fake();
        Product::factory()->count(3)->create();

        $foundProducts = app(GetAllProductsTask::class)->run();

        $this->assertCount(3, $foundProducts);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundProducts);
        Event::assertDispatched(ProductsListedEvent::class);
    }
}
