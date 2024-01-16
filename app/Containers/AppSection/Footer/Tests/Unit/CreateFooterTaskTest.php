<?php

namespace App\Containers\AppSection\Footer\Tests\Unit;

use App\Containers\AppSection\Footer\Events\FooterCreatedEvent;
use App\Containers\AppSection\Footer\Tasks\CreateFooterTask;
use App\Containers\AppSection\Footer\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateFooterTaskTest.
 *
 * @group footer
 * @group unit
 */
class CreateFooterTaskTest extends UnitTestCase
{
    public function testCreateFooter(): void
    {
        Event::fake();
        $data = [];

        $footer = app(CreateFooterTask::class)->run($data);

        $this->assertModelExists($footer);
        Event::assertDispatched(FooterCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateFooterWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateFooterTask::class)->run($data);
//    }
}
