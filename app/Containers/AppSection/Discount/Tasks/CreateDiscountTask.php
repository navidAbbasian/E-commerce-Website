<?php

namespace App\Containers\AppSection\Discount\Tasks;

use App\Containers\AppSection\Discount\Data\Repositories\DiscountRepository;
use App\Containers\AppSection\Discount\Events\DiscountCreatedEvent;
use App\Containers\AppSection\Discount\Models\Discount;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateDiscountTask extends ParentTask
{
    public function __construct(
        protected DiscountRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Discount
    {
        try {
            $discount = $this->repository->create($data);
            DiscountCreatedEvent::dispatch($discount);

            return $discount;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
