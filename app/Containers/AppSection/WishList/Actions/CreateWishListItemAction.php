<?php

namespace App\Containers\AppSection\WishList\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\WishList\Models\WishListItem;
use App\Containers\AppSection\WishList\Tasks\CreateWishListItemTask;
use App\Containers\AppSection\WishList\UI\API\Requests\CreateWishListItemRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateWishListItemAction extends ParentAction
{
    /**
     * @param CreateWishListItemRequest $request
     * @return WishListItem
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateWishListItemRequest $request): WishListItem
    {
        $data = $request->sanitizeInput([
            'wish_list_id',
            'product_id',
        ]);

        return app(CreateWishListItemTask::class)->run($data);
    }
}
