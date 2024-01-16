<?php

namespace App\Containers\AppSection\Footer\Tasks;

use App\Containers\AppSection\Footer\Data\Repositories\FooterRepository;
use App\Containers\AppSection\Footer\Events\FooterFoundByIdEvent;
use App\Containers\AppSection\Footer\Models\Footer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindFooterByIdTask extends ParentTask
{
    public function __construct(
        protected FooterRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Footer
    {
        try {
            $footer = $this->repository->find($id);
            FooterFoundByIdEvent::dispatch($footer);

            return $footer;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
