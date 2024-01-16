<?php

namespace App\Containers\AppSection\Header\Tasks;

use App\Containers\AppSection\Header\Data\Repositories\HeaderRepository;
use App\Containers\AppSection\Header\Events\HeaderFoundByIdEvent;
use App\Containers\AppSection\Header\Models\Header;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindHeaderByIdTask extends ParentTask
{
    public function __construct(
        protected HeaderRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Header
    {
        try {
            $header = $this->repository->find($id);
            HeaderFoundByIdEvent::dispatch($header);

            return $header;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
