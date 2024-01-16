<?php

namespace App\Containers\AppSection\Header\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Header\Models\Header;
use App\Containers\AppSection\Header\Tasks\UpdateHeaderTask;
use App\Containers\AppSection\Header\UI\API\Requests\UpdateHeaderRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateHeaderAction extends ParentAction
{
    /**
     * @param UpdateHeaderRequest $request
     * @return Header
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateHeaderRequest $request): Header
    {
        $data = $request->sanitizeInput([
            'title',
            'link',
            'order',
        ]);

        return app(UpdateHeaderTask::class)->run($data, $request->id);
    }
}
