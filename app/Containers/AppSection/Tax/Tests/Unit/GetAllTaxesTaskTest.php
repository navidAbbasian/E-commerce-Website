<?php

namespace App\Containers\AppSection\Tax\Tests\Unit;

use App\Containers\AppSection\Tax\Events\TaxesListedEvent;
use App\Containers\AppSection\Tax\Models\Tax;
use App\Containers\AppSection\Tax\Tasks\GetAllTaxesTask;
use App\Containers\AppSection\Tax\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllTaxesTaskTest.
 *
 * @group tax
 * @group unit
 */
class GetAllTaxesTaskTest extends UnitTestCase
{
    public function testGetAllTaxes(): void
    {
        Event::fake();
        Tax::factory()->count(3)->create();

        $foundTaxes = app(GetAllTaxesTask::class)->run();

        $this->assertCount(3, $foundTaxes);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundTaxes);
        Event::assertDispatched(TaxesListedEvent::class);
    }
}
