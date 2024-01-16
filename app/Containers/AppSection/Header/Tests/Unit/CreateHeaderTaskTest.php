<?php

namespace App\Containers\AppSection\Header\Tests\Unit;

use App\Containers\AppSection\Header\Events\HeaderCreatedEvent;
use App\Containers\AppSection\Header\Tasks\CreateHeaderTask;
use App\Containers\AppSection\Header\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateHeaderTaskTest.
 *
 * @group header
 * @group unit
 */
class CreateHeaderTaskTest extends UnitTestCase
{
    public function testCreateHeader(): void
    {
        Event::fake();
        $data = [];

        $header = app(CreateHeaderTask::class)->run($data);

        $this->assertModelExists($header);
        Event::assertDispatched(HeaderCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateHeaderWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateHeaderTask::class)->run($data);
//    }
}
