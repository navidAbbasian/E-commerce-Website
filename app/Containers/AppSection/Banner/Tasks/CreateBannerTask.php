<?php

namespace App\Containers\AppSection\Banner\Tasks;

use App\Containers\AppSection\Banner\Data\Repositories\BannerRepository;
use App\Containers\AppSection\Banner\Events\BannerCreatedEvent;
use App\Containers\AppSection\Banner\Models\Banner;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateBannerTask extends ParentTask
{
    public function __construct(
        protected BannerRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Banner
    {
        try {
            $banner = $this->repository->create($data);
            BannerCreatedEvent::dispatch($banner);

            return $banner;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
