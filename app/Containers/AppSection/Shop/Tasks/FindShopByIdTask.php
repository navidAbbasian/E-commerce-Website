<?php

namespace App\Containers\AppSection\Shop\Tasks;

use App\Containers\AppSection\Shop\Data\Repositories\ShopRepository;
use App\Containers\AppSection\Shop\Events\ShopFoundByIdEvent;
use App\Containers\AppSection\Shop\Models\Shop;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindShopByIdTask extends ParentTask
{
    public function __construct(
        protected ShopRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Shop
    {
        try {
            $shop = $this->repository->find($id);
            ShopFoundByIdEvent::dispatch($shop);

            return $shop;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
