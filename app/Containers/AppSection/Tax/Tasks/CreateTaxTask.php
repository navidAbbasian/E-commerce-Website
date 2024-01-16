<?php

namespace App\Containers\AppSection\Tax\Tasks;

use App\Containers\AppSection\Tax\Data\Repositories\TaxRepository;
use App\Containers\AppSection\Tax\Events\TaxCreatedEvent;
use App\Containers\AppSection\Tax\Models\Tax;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateTaxTask extends ParentTask
{
    public function __construct(
        protected TaxRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Tax
    {
        try {
            $tax = $this->repository->create($data);
            TaxCreatedEvent::dispatch($tax);

            return $tax;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
