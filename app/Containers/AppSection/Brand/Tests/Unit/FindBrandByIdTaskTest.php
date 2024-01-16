<?php

namespace App\Containers\AppSection\Brand\Tests\Unit;

use App\Containers\AppSection\Brand\Events\BrandFoundByIdEvent;
use App\Containers\AppSection\Brand\Models\Brand;
use App\Containers\AppSection\Brand\Tasks\FindBrandByIdTask;
use App\Containers\AppSection\Brand\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindBrandByIdTaskTest.
 *
 * @group brand
 * @group unit
 */
class FindBrandByIdTaskTest extends UnitTestCase
{
    public function testFindBrandById(): void
    {
        Event::fake();
        $brand = Brand::factory()->create();

        $foundBrand = app(FindBrandByIdTask::class)->run($brand->id);

        $this->assertEquals($brand->id, $foundBrand->id);
        Event::assertDispatched(BrandFoundByIdEvent::class);
    }

    public function testFindBrandWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindBrandByIdTask::class)->run($noneExistingId);
    }
}
