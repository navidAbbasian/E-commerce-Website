<?php

namespace App\Containers\AppSection\Header\Tests\Unit;

use App\Containers\AppSection\Header\Models\Header;
use App\Containers\AppSection\Header\Tests\UnitTestCase;

/**
 * Class HeaderFactoryTest.
 *
 * @group header
 * @group unit
 */
class HeaderFactoryTest extends UnitTestCase
{
    public function testCreateHeader(): void
    {
        $header = Header::factory()->make();

        $this->assertInstanceOf(Header::class, $header);
    }
}
