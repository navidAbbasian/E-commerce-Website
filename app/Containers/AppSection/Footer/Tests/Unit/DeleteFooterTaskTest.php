<?php

namespace App\Containers\AppSection\Footer\Tests\Unit;

use App\Containers\AppSection\Footer\Events\FooterDeletedEvent;
use App\Containers\AppSection\Footer\Models\Footer;
use App\Containers\AppSection\Footer\Tasks\DeleteFooterTask;
use App\Containers\AppSection\Footer\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class DeleteFooterTaskTest.
 *
 * @group footer
 * @group unit
 */
class DeleteFooterTaskTest extends UnitTestCase
{
    public function testDeleteFooter(): void
    {
        Event::fake();
        $footer = Footer::factory()->create();

        $result = app(DeleteFooterTask::class)->run($footer->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(FooterDeletedEvent::class);
    }

    public function testDeleteFooterWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteFooterTask::class)->run($noneExistingId);
    }
}
