<?php

namespace App\Containers\AppSection\Shop\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Shop\Models\Shop;
use App\Containers\AppSection\Shop\Tasks\CreateShopTask;
use App\Containers\AppSection\Shop\UI\API\Requests\CreateShopRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateShopAction extends ParentAction
{
    /**
     * @param CreateShopRequest $request
     * @return Shop
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateShopRequest $request): Shop
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'user_id',
            'title',
            'meta_title',
            'description',
            'meta_description',
            'address',
            'email',
            'area_code',
            'phone',
            'score_worth',
            'status',
        ]);

        return app(CreateShopTask::class)->run($data);
    }
}
