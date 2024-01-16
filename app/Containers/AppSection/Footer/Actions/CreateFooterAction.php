<?php

namespace App\Containers\AppSection\Footer\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Footer\Models\Footer;
use App\Containers\AppSection\Footer\Tasks\CreateFooterTask;
use App\Containers\AppSection\Footer\UI\API\Requests\CreateFooterRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateFooterAction extends ParentAction
{
    /**
     * @param CreateFooterRequest $request
     * @return Footer
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateFooterRequest $request): Footer
    {
        $data = $request->sanitizeInput([
            'shop_id',
            'parent_id',
            'title',
            'link',
            'order',
        ]);

        return app(CreateFooterTask::class)->run($data);
    }
}
