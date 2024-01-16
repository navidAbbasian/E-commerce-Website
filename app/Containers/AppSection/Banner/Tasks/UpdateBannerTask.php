<?php

namespace App\Containers\AppSection\Banner\Tasks;

use App\Containers\AppSection\Banner\Data\Repositories\BannerRepository;
use App\Containers\AppSection\Banner\Events\BannerUpdatedEvent;
use App\Containers\AppSection\Banner\Models\Banner;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateBannerTask extends ParentTask
{
    public function __construct(
        protected BannerRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Banner
    {
        try {
            $banner = $this->repository->update($data, $id);
            BannerUpdatedEvent::dispatch($banner);

            return $banner;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
