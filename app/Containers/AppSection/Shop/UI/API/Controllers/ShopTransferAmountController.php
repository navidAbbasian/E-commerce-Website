<?php

namespace App\Containers\AppSection\Shop\UI\API\Controllers;

use App\Containers\AppSection\Shop\Actions\AssignTransferAmountToShopAction;
use App\Containers\AppSection\Shop\Actions\RevokeTransferAmountFromShopAction;
use App\Containers\AppSection\Shop\UI\API\Requests\AssignTransferAmountToShopRequest;
use App\Containers\AppSection\Shop\UI\API\Requests\RevokeTransferAmountFromShopRequest;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class ShopTransferAmountController extends ApiController
{
    /**
     * @param AssignTransferAmountToShopRequest $request
     * @return JsonResponse
     */
    public function assignTransferAmountToShop(AssignTransferAmountToShopRequest $request): JsonResponse
    {
        $assignTransferAmountToShop = app(AssignTransferAmountToShopAction::class)->run($request);

        $response = [
            'data' => $assignTransferAmountToShop,
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * @param RevokeTransferAmountFromShopRequest $request
     * @return JsonResponse
     */
    public function revokeTransferAmountFromShop(RevokeTransferAmountFromShopRequest $request): JsonResponse
    {
        app(RevokeTransferAmountFromShopAction::class)->run($request);

        return $this->noContent();
    }
}
