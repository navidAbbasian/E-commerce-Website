<?php

namespace App\Containers\AppSection\Brand\Tests\Unit;

use App\Containers\AppSection\Brand\Events\BrandUpdatedEvent;
use App\Containers\AppSection\Brand\Models\Brand;
use App\Containers\AppSection\Brand\Tasks\UpdateBrandTask;
use App\Containers\AppSection\Brand\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class UpdateBrandTaskTest.
 *
 * @group brand
 * @group unit
 */
class UpdateBrandTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateBrand(): void
    {
        Event::fake();
        $brand = Brand::factory()->create();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedBrand = app(UpdateBrandTask::class)->run($data, $brand->id);

        $this->assertEquals($brand->id, $updatedBrand->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedBrand->some_field);
        Event::assertDispatched(BrandUpdatedEvent::class);
    }

    public function testUpdateBrandWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateBrandTask::class)->run([], $noneExistingId);
    }
}
