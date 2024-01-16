<?php

namespace App\Containers\AppSection\Brand\Tests\Unit;

use App\Containers\AppSection\Brand\Events\BrandsListedEvent;
use App\Containers\AppSection\Brand\Models\Brand;
use App\Containers\AppSection\Brand\Tasks\GetAllBrandsTask;
use App\Containers\AppSection\Brand\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllBrandsTaskTest.
 *
 * @group brand
 * @group unit
 */
class GetAllBrandsTaskTest extends UnitTestCase
{
    public function testGetAllBrands(): void
    {
        Event::fake();
        Brand::factory()->count(3)->create();

        $foundBrands = app(GetAllBrandsTask::class)->run();

        $this->assertCount(3, $foundBrands);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundBrands);
        Event::assertDispatched(BrandsListedEvent::class);
    }
}
