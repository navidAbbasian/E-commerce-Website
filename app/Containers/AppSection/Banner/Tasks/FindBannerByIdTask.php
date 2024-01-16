<?php

namespace App\Containers\AppSection\Banner\Tasks;

use App\Containers\AppSection\Banner\Data\Repositories\BannerRepository;
use App\Containers\AppSection\Banner\Events\BannerFoundByIdEvent;
use App\Containers\AppSection\Banner\Models\Banner;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindBannerByIdTask extends ParentTask
{
    public function __construct(
        protected BannerRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Banner
    {
        try {
            $banner = $this->repository->find($id);
            BannerFoundByIdEvent::dispatch($banner);

            return $banner;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
