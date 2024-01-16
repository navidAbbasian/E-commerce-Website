<?php

namespace App\Containers\AppSection\Footer\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Footer\Models\Footer;
use App\Containers\AppSection\Footer\Tasks\UpdateFooterTask;
use App\Containers\AppSection\Footer\UI\API\Requests\UpdateFooterRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateFooterAction extends ParentAction
{
    /**
     * @param UpdateFooterRequest $request
     * @return Footer
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateFooterRequest $request): Footer
    {
        $data = $request->sanitizeInput([
            'parent_id',
            'title',
            'link',
            'order',
        ]);

        return app(UpdateFooterTask::class)->run($data, $request->id);
    }
}
