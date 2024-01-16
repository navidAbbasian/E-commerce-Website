<?php

namespace App\Containers\AppSection\Discount\Tests\Unit;

use App\Containers\AppSection\Discount\Events\DiscountUpdatedEvent;
use App\Containers\AppSection\Discount\Models\Discount;
use App\Containers\AppSection\Discount\Tasks\UpdateDiscountTask;
use App\Containers\AppSection\Discount\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class UpdateDiscountTaskTest.
 *
 * @group discount
 * @group unit
 */
class UpdateDiscountTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateDiscount(): void
    {
        Event::fake();
        $discount = Discount::factory()->create();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedDiscount = app(UpdateDiscountTask::class)->run($data, $discount->id);

        $this->assertEquals($discount->id, $updatedDiscount->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedDiscount->some_field);
        Event::assertDispatched(DiscountUpdatedEvent::class);
    }

    public function testUpdateDiscountWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateDiscountTask::class)->run([], $noneExistingId);
    }
}
