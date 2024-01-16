<?php

namespace App\Containers\AppSection\Tax\Tests\Unit;

use App\Containers\AppSection\Tax\Events\TaxFoundByIdEvent;
use App\Containers\AppSection\Tax\Models\Tax;
use App\Containers\AppSection\Tax\Tasks\FindTaxByIdTask;
use App\Containers\AppSection\Tax\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindTaxByIdTaskTest.
 *
 * @group tax
 * @group unit
 */
class FindTaxByIdTaskTest extends UnitTestCase
{
    public function testFindTaxById(): void
    {
        Event::fake();
        $tax = Tax::factory()->create();

        $foundTax = app(FindTaxByIdTask::class)->run($tax->id);

        $this->assertEquals($tax->id, $foundTax->id);
        Event::assertDispatched(TaxFoundByIdEvent::class);
    }

    public function testFindTaxWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindTaxByIdTask::class)->run($noneExistingId);
    }
}
