<?php

namespace App\Containers\AppSection\Footer\Tasks;

use App\Containers\AppSection\Footer\Data\Repositories\FooterRepository;
use App\Containers\AppSection\Footer\Events\FooterUpdatedEvent;
use App\Containers\AppSection\Footer\Models\Footer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateFooterTask extends ParentTask
{
    public function __construct(
        protected FooterRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Footer
    {
        try {
            $footer = $this->repository->update($data, $id);
            FooterUpdatedEvent::dispatch($footer);

            return $footer;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
