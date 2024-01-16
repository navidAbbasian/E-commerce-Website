<?php

namespace App\Containers\AppSection\WishList\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\WishList\Models\WishList;
use App\Containers\AppSection\WishList\Tasks\UpdateWishListTask;
use App\Containers\AppSection\WishList\UI\API\Requests\UpdateWishListRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateWishListAction extends ParentAction
{
    /**
     * @param UpdateWishListRequest $request
     * @return WishList
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateWishListRequest $request): WishList
    {
        $data = $request->sanitizeInput([
            'shop_id',
            'customer_id',
        ]);

        return app(UpdateWishListTask::class)->run($data, $request->id);
    }
}
