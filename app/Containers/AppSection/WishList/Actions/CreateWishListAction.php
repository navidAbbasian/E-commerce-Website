<?php

namespace App\Containers\AppSection\WishList\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\WishList\Models\WishList;
use App\Containers\AppSection\WishList\Tasks\CreateWishListTask;
use App\Containers\AppSection\WishList\UI\API\Requests\CreateWishListRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateWishListAction extends ParentAction
{
    /**
     * @param CreateWishListRequest $request
     * @return WishList
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateWishListRequest $request): WishList
    {
        $data = $request->sanitizeInput([
            'shop_id',
            'customer_id',
        ]);

        return app(CreateWishListTask::class)->run($data);
    }
}
