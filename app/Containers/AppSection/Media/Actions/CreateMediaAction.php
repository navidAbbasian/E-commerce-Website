<?php

namespace App\Containers\AppSection\Media\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Media\Models\Media;
use App\Containers\AppSection\Media\Tasks\CreateMediaTask;
use App\Containers\AppSection\Media\UI\API\Requests\CreateMediaRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateMediaAction extends ParentAction
{
    /**
     * @param CreateMediaRequest $request
     * @return Media
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateMediaRequest $request): Media
    {
        $data = $request->sanitizeInput([
            'original_media_id',
            'disk',
            'directory',
            'filename',
            'mime_type',
            'size',
            'alt',
            'title',
            'variant_name',
            'upload_via',
        ]);

        return app(CreateMediaTask::class)->run($data);
    }
}
