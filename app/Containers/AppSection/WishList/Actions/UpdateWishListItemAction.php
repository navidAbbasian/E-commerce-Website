<?php

namespace App\Containers\AppSection\WishList\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\WishList\Models\WishListItem;
use App\Containers\AppSection\WishList\Tasks\UpdateWishListItemTask;
use App\Containers\AppSection\WishList\UI\API\Requests\UpdateWishListItemRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateWishListItemAction extends ParentAction
{
    /**
     * @param UpdateWishListItemRequest $request
     * @return WishListItem
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateWishListItemRequest $request): WishListItem
    {
        $data = $request->sanitizeInput([
            'wish_list_id',
            'product_id',
        ]);

        return app(UpdateWishListItemTask::class)->run($data, $request->id);
    }
}
