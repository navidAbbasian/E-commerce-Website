<?php

namespace App\Containers\AppSection\Tax\Tasks;

use App\Containers\AppSection\Tax\Data\Repositories\TaxRepository;
use App\Containers\AppSection\Tax\Events\TaxFoundByIdEvent;
use App\Containers\AppSection\Tax\Models\Tax;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindTaxByIdTask extends ParentTask
{
    public function __construct(
        protected TaxRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Tax
    {
        try {
            $tax = $this->repository->find($id);
            TaxFoundByIdEvent::dispatch($tax);

            return $tax;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
