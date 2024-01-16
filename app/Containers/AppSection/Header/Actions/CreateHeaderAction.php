<?php

namespace App\Containers\AppSection\Header\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Header\Models\Header;
use App\Containers\AppSection\Header\Tasks\CreateHeaderTask;
use App\Containers\AppSection\Header\UI\API\Requests\CreateHeaderRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateHeaderAction extends ParentAction
{
    /**
     * @param CreateHeaderRequest $request
     * @return Header
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateHeaderRequest $request): Header
    {
        $data = $request->sanitizeInput([
            'shop_id',
            'title',
            'link',
            'order',
        ]);

        return app(CreateHeaderTask::class)->run($data);
    }
}
