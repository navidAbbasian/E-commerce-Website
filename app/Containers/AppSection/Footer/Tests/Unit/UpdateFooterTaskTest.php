<?php

namespace App\Containers\AppSection\Footer\Tests\Unit;

use App\Containers\AppSection\Footer\Events\FooterUpdatedEvent;
use App\Containers\AppSection\Footer\Models\Footer;
use App\Containers\AppSection\Footer\Tasks\UpdateFooterTask;
use App\Containers\AppSection\Footer\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class UpdateFooterTaskTest.
 *
 * @group footer
 * @group unit
 */
class UpdateFooterTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateFooter(): void
    {
        Event::fake();
        $footer = Footer::factory()->create();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedFooter = app(UpdateFooterTask::class)->run($data, $footer->id);

        $this->assertEquals($footer->id, $updatedFooter->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedFooter->some_field);
        Event::assertDispatched(FooterUpdatedEvent::class);
    }

    public function testUpdateFooterWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateFooterTask::class)->run([], $noneExistingId);
    }
}
