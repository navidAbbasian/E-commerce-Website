<?php

namespace App\Containers\AppSection\WishList\Tasks;

use App\Containers\AppSection\WishList\Data\Repositories\WishListItemRepository;
use App\Containers\AppSection\WishList\Events\WishListItemUpdatedEvent;
use App\Containers\AppSection\WishList\Models\WishListItem;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateWishListItemTask extends ParentTask
{
    public function __construct(
        protected WishListItemRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): WishListItem
    {
        try {
            $wishlistitem = $this->repository->update($data, $id);
            WishListItemUpdatedEvent::dispatch($wishlistitem);

            return $wishlistitem;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
