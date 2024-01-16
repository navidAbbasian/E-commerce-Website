<?php

namespace App\Containers\AppSection\Header\Tasks;

use App\Containers\AppSection\Header\Data\Repositories\HeaderRepository;
use App\Containers\AppSection\Header\Events\HeaderUpdatedEvent;
use App\Containers\AppSection\Header\Models\Header;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateHeaderTask extends ParentTask
{
    public function __construct(
        protected HeaderRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Header
    {
        try {
            $header = $this->repository->update($data, $id);
            HeaderUpdatedEvent::dispatch($header);

            return $header;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
