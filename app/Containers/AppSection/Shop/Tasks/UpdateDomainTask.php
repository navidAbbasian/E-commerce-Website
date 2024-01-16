<?php

namespace App\Containers\AppSection\Shop\Tasks;

use App\Containers\AppSection\Shop\Data\Repositories\DomainRepository;
// use App\Containers\AppSection\Shop\Events\DomainUpdatedEvent;
use App\Containers\AppSection\Shop\Models\Domain;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateDomainTask extends ParentTask
{
    public function __construct(
        protected DomainRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Domain
    {
        try {
            $domain = $this->repository->update($data, $id);
            // DomainUpdatedEvent::dispatch($domain);

            return $domain;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
