<?php

namespace App\Containers\AppSection\Discount\Tasks;

use App\Containers\AppSection\Discount\Data\Repositories\DiscountRepository;
use App\Containers\AppSection\Discount\Events\DiscountUpdatedEvent;
use App\Containers\AppSection\Discount\Models\Discount;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateDiscountTask extends ParentTask
{
    public function __construct(
        protected DiscountRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Discount
    {
        try {
            $discount = $this->repository->update($data, $id);
            DiscountUpdatedEvent::dispatch($discount);

            return $discount;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
