<?php

namespace App\Containers\AppSection\Header\Tests\Unit;

use App\Containers\AppSection\Header\Events\HeaderUpdatedEvent;
use App\Containers\AppSection\Header\Models\Header;
use App\Containers\AppSection\Header\Tasks\UpdateHeaderTask;
use App\Containers\AppSection\Header\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class UpdateHeaderTaskTest.
 *
 * @group header
 * @group unit
 */
class UpdateHeaderTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateHeader(): void
    {
        Event::fake();
        $header = Header::factory()->create();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedHeader = app(UpdateHeaderTask::class)->run($data, $header->id);

        $this->assertEquals($header->id, $updatedHeader->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedHeader->some_field);
        Event::assertDispatched(HeaderUpdatedEvent::class);
    }

    public function testUpdateHeaderWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateHeaderTask::class)->run([], $noneExistingId);
    }
}
