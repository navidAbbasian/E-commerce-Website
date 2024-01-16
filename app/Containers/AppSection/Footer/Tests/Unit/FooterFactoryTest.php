<?php

namespace App\Containers\AppSection\Footer\Tests\Unit;

use App\Containers\AppSection\Footer\Models\Footer;
use App\Containers\AppSection\Footer\Tests\UnitTestCase;

/**
 * Class FooterFactoryTest.
 *
 * @group footer
 * @group unit
 */
class FooterFactoryTest extends UnitTestCase
{
    public function testCreateFooter(): void
    {
        $footer = Footer::factory()->make();

        $this->assertInstanceOf(Footer::class, $footer);
    }
}
