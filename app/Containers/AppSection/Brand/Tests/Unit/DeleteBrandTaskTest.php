<?php

namespace App\Containers\AppSection\Brand\Tests\Unit;

use App\Containers\AppSection\Brand\Events\BrandDeletedEvent;
use App\Containers\AppSection\Brand\Models\Brand;
use App\Containers\AppSection\Brand\Tasks\DeleteBrandTask;
use App\Containers\AppSection\Brand\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class DeleteBrandTaskTest.
 *
 * @group brand
 * @group unit
 */
class DeleteBrandTaskTest extends UnitTestCase
{
    public function testDeleteBrand(): void
    {
        Event::fake();
        $brand = Brand::factory()->create();

        $result = app(DeleteBrandTask::class)->run($brand->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(BrandDeletedEvent::class);
    }

    public function testDeleteBrandWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteBrandTask::class)->run($noneExistingId);
    }
}
