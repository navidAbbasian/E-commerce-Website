<?php

namespace App\Containers\AppSection\Discount\Tasks;

use App\Containers\AppSection\Discount\Data\Repositories\DiscountRepository;
use App\Containers\AppSection\Discount\Events\DiscountFoundByIdEvent;
use App\Containers\AppSection\Discount\Models\Discount;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindDiscountByIdTask extends ParentTask
{
    public function __construct(
        protected DiscountRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Discount
    {
        try {
            $discount = $this->repository->find($id);
            DiscountFoundByIdEvent::dispatch($discount);

            return $discount;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
