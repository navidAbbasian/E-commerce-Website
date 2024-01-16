<?php

namespace App\Containers\AppSection\Shop\Tasks;

use App\Containers\AppSection\Shop\Data\Repositories\DomainRepository;
// use App\Containers\AppSection\Shop\Events\DomainCreatedEvent;
use App\Containers\AppSection\Shop\Models\Domain;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateDomainTask extends ParentTask
{
    public function __construct(
        protected DomainRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Domain
    {
        try {
            $domain = $this->repository->create($data);
            // DomainCreatedEvent::dispatch($domain);

            return $domain;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
