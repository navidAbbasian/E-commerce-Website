<?php

namespace App\Containers\AppSection\Shop\Tasks;

use App\Containers\AppSection\Shop\Data\Repositories\DomainRepository;
// use App\Containers\AppSection\Shop\Events\DomainFoundByIdEvent;
use App\Containers\AppSection\Shop\Models\Domain;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindDomainByIdTask extends ParentTask
{
    public function __construct(
        protected DomainRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Domain
    {
        try {
            $domain = $this->repository->find($id);
            // DomainFoundByIdEvent::dispatch($domain);

            return $domain;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
