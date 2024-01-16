<?php

namespace App\Containers\AppSection\Shop\Tasks;

use App\Containers\AppSection\Shop\Data\Repositories\DomainRepository;
// use App\Containers\AppSection\Shop\Events\DomainDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteDomainTask extends ParentTask
{
    public function __construct(
        protected DomainRepository $repository
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        try {
            $result = $this->repository->delete($id);
            // DomainDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
