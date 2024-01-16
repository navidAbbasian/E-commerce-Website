<?php

namespace App\Containers\AppSection\Footer\Tasks;

use App\Containers\AppSection\Footer\Data\Repositories\FooterRepository;
use App\Containers\AppSection\Footer\Events\FooterCreatedEvent;
use App\Containers\AppSection\Footer\Models\Footer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateFooterTask extends ParentTask
{
    public function __construct(
        protected FooterRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Footer
    {
        try {
            $footer = $this->repository->create($data);
            FooterCreatedEvent::dispatch($footer);

            return $footer;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
