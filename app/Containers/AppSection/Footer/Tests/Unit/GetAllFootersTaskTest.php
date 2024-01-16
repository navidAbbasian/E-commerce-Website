<?php

namespace App\Containers\AppSection\Footer\Tests\Unit;

use App\Containers\AppSection\Footer\Events\FootersListedEvent;
use App\Containers\AppSection\Footer\Models\Footer;
use App\Containers\AppSection\Footer\Tasks\GetAllFootersTask;
use App\Containers\AppSection\Footer\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllFootersTaskTest.
 *
 * @group footer
 * @group unit
 */
class GetAllFootersTaskTest extends UnitTestCase
{
    public function testGetAllFooters(): void
    {
        Event::fake();
        Footer::factory()->count(3)->create();

        $foundFooters = app(GetAllFootersTask::class)->run();

        $this->assertCount(3, $foundFooters);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundFooters);
        Event::assertDispatched(FootersListedEvent::class);
    }
}
