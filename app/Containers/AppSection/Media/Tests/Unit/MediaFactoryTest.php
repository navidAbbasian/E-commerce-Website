<?php

namespace App\Containers\AppSection\Media\Tests\Unit;

use App\Containers\AppSection\Media\Models\Media;
use App\Containers\AppSection\Media\Tests\UnitTestCase;

/**
 * Class MediaFactoryTest.
 *
 * @group media
 * @group unit
 */
class MediaFactoryTest extends UnitTestCase
{
    public function testCreateMedia(): void
    {
        $media = Media::factory()->make();

        $this->assertInstanceOf(Media::class, $media);
    }
}
