<?php

namespace App\Containers\AppSection\WishList\Tasks;

use App\Containers\AppSection\WishList\Data\Repositories\WishListRepository;
use App\Containers\AppSection\WishList\Events\WishListUpdatedEvent;
use App\Containers\AppSection\WishList\Models\WishList;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateWishListTask extends ParentTask
{
    public function __construct(
        protected WishListRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): WishList
    {
        try {
            $wishlist = $this->repository->update($data, $id);
            WishListUpdatedEvent::dispatch($wishlist);

            return $wishlist;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
