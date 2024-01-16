<?php

namespace App\Containers\AppSection\Tax\Tests\Unit;

use App\Containers\AppSection\Tax\Events\TaxCreatedEvent;
use App\Containers\AppSection\Tax\Tasks\CreateTaxTask;
use App\Containers\AppSection\Tax\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateTaxTaskTest.
 *
 * @group tax
 * @group unit
 */
class CreateTaxTaskTest extends UnitTestCase
{
    public function testCreateTax(): void
    {
        Event::fake();
        $data = [];

        $tax = app(CreateTaxTask::class)->run($data);

        $this->assertModelExists($tax);
        Event::assertDispatched(TaxCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateTaxWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateTaxTask::class)->run($data);
//    }
}
