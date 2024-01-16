<?php

namespace App\Containers\AppSection\Header\UI\API\Tests\Functional;

use App\Containers\AppSection\Header\Models\Header;
use App\Containers\AppSection\Header\UI\API\Tests\ApiTestCase;

/**
 * Class DeleteHeaderTest.
 *
 * @group header
 * @group api
 */
class DeleteHeaderTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/headers/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingHeader(): void
    {
        $header = Header::factory()->create();

        $response = $this->injectId($header->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingHeader(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotDeleteHeader(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        $header = Header::factory()->create();
//
//        $response = $this->injectId($header->id)->makeCall();
//
//        $response->assertStatus(403);
//    }
}
