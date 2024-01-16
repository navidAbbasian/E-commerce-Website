<?php

namespace App\Containers\AppSection\Tax\Tests\Unit;

use App\Containers\AppSection\Tax\Events\TaxUpdatedEvent;
use App\Containers\AppSection\Tax\Models\Tax;
use App\Containers\AppSection\Tax\Tasks\UpdateTaxTask;
use App\Containers\AppSection\Tax\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class UpdateTaxTaskTest.
 *
 * @group tax
 * @group unit
 */
class UpdateTaxTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateTax(): void
    {
        Event::fake();
        $tax = Tax::factory()->create();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedTax = app(UpdateTaxTask::class)->run($data, $tax->id);

        $this->assertEquals($tax->id, $updatedTax->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedTax->some_field);
        Event::assertDispatched(TaxUpdatedEvent::class);
    }

    public function testUpdateTaxWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateTaxTask::class)->run([], $noneExistingId);
    }
}
