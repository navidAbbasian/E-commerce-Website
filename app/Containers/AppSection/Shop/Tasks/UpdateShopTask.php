<?php

namespace App\Containers\AppSection\Shop\Tasks;

use App\Containers\AppSection\Shop\Data\Repositories\ShopRepository;
use App\Containers\AppSection\Shop\Events\ShopUpdatedEvent;
use App\Containers\AppSection\Shop\Models\Shop;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateShopTask extends ParentTask
{
    public function __construct(
        protected ShopRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Shop
    {
        try {
            $shop = $this->repository->update($data, $id);
            ShopUpdatedEvent::dispatch($shop);

            return $shop;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
