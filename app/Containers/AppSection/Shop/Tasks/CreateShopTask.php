<?php

namespace App\Containers\AppSection\Shop\Tasks;

use App\Containers\AppSection\Shop\Data\Repositories\ShopRepository;
use App\Containers\AppSection\Shop\Events\ShopCreatedEvent;
use App\Containers\AppSection\Shop\Models\Shop;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateShopTask extends ParentTask
{
    public function __construct(
        protected ShopRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Shop
    {
        try {
            $shop = $this->repository->create($data);
            ShopCreatedEvent::dispatch($shop);

            return $shop;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
