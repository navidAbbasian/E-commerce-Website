<?php

namespace App\Containers\AppSection\Footer\Tests\Unit;

use App\Containers\AppSection\Footer\Events\FooterFoundByIdEvent;
use App\Containers\AppSection\Footer\Models\Footer;
use App\Containers\AppSection\Footer\Tasks\FindFooterByIdTask;
use App\Containers\AppSection\Footer\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindFooterByIdTaskTest.
 *
 * @group footer
 * @group unit
 */
class FindFooterByIdTaskTest extends UnitTestCase
{
    public function testFindFooterById(): void
    {
        Event::fake();
        $footer = Footer::factory()->create();

        $foundFooter = app(FindFooterByIdTask::class)->run($footer->id);

        $this->assertEquals($footer->id, $foundFooter->id);
        Event::assertDispatched(FooterFoundByIdEvent::class);
    }

    public function testFindFooterWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindFooterByIdTask::class)->run($noneExistingId);
    }
}
