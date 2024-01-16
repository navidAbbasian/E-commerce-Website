<?php

namespace App\Containers\AppSection\Footer\UI\API\Tests\Functional;

use App\Containers\AppSection\Footer\Models\Footer;
use App\Containers\AppSection\Footer\UI\API\Tests\ApiTestCase;
use Hashids;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindFooterByIdTest.
 *
 * @group footer
 * @group api
 */
class FindFooterByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/footers/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindFooter(): void
    {
        $footer = Footer::factory()->create();

        $response = $this->injectId($footer->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', Hashids::encode($footer->id))
                    ->etc()
        );
    }

    public function testFindNonExistingFooter(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredFooterResponse(): void
    {
        $footer = Footer::factory()->create();

        $response = $this->injectId($footer->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $footer->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
//    public function testFindFooterWithRelation(): void
//    {
//        $footer = Footer::factory()->create();
//        $relation = 'roles';
//
//        $response = $this->injectId($footer->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//              $json->has('data')
//                  ->where('data.id', $footer->getHashedKey())
//                  ->count("data.$relation.data", 1)
//                  ->where("data.$relation.data.0.name", 'something')
//                  ->etc()
//        );
//    }
}
