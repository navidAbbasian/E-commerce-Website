<?php

namespace App\Containers\AppSection\Header\Tasks;

use App\Containers\AppSection\Header\Data\Repositories\HeaderRepository;
use App\Containers\AppSection\Header\Events\HeaderCreatedEvent;
use App\Containers\AppSection\Header\Models\Header;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateHeaderTask extends ParentTask
{
    public function __construct(
        protected HeaderRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Header
    {
        try {
            $header = $this->repository->create($data);
            HeaderCreatedEvent::dispatch($header);

            return $header;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
