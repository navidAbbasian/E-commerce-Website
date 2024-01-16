<?php

namespace App\Containers\AppSection\Footer\UI\API\Tests\Functional;

use App\Containers\AppSection\Footer\Models\Footer;
use App\Containers\AppSection\Footer\UI\API\Tests\ApiTestCase;

/**
 * Class DeleteFooterTest.
 *
 * @group footer
 * @group api
 */
class DeleteFooterTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/footers/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingFooter(): void
    {
        $footer = Footer::factory()->create();

        $response = $this->injectId($footer->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingFooter(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotDeleteFooter(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        $footer = Footer::factory()->create();
//
//        $response = $this->injectId($footer->id)->makeCall();
//
//        $response->assertStatus(403);
//    }
}
