<?php

namespace App\Containers\AppSection\Tax\Tasks;

use App\Containers\AppSection\Tax\Data\Repositories\TaxRepository;
use App\Containers\AppSection\Tax\Events\TaxUpdatedEvent;
use App\Containers\AppSection\Tax\Models\Tax;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateTaxTask extends ParentTask
{
    public function __construct(
        protected TaxRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Tax
    {
        try {
            $tax = $this->repository->update($data, $id);
            TaxUpdatedEvent::dispatch($tax);

            return $tax;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
