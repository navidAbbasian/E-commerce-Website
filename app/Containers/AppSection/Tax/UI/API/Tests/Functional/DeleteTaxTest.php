<?php

namespace App\Containers\AppSection\Tax\UI\API\Tests\Functional;

use App\Containers\AppSection\Tax\Models\Tax;
use App\Containers\AppSection\Tax\UI\API\Tests\ApiTestCase;

/**
 * Class DeleteTaxTest.
 *
 * @group tax
 * @group api
 */
class DeleteTaxTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/taxes/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingTax(): void
    {
        $tax = Tax::factory()->create();

        $response = $this->injectId($tax->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingTax(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotDeleteTax(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        $tax = Tax::factory()->create();
//
//        $response = $this->injectId($tax->id)->makeCall();
//
//        $response->assertStatus(403);
//    }
}
