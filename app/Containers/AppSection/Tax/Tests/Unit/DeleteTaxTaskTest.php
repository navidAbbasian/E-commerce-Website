<?php

namespace App\Containers\AppSection\Tax\Tests\Unit;

use App\Containers\AppSection\Tax\Events\TaxDeletedEvent;
use App\Containers\AppSection\Tax\Models\Tax;
use App\Containers\AppSection\Tax\Tasks\DeleteTaxTask;
use App\Containers\AppSection\Tax\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class DeleteTaxTaskTest.
 *
 * @group tax
 * @group unit
 */
class DeleteTaxTaskTest extends UnitTestCase
{
    public function testDeleteTax(): void
    {
        Event::fake();
        $tax = Tax::factory()->create();

        $result = app(DeleteTaxTask::class)->run($tax->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(TaxDeletedEvent::class);
    }

    public function testDeleteTaxWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteTaxTask::class)->run($noneExistingId);
    }
}
