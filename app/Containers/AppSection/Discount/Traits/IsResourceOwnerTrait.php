<?php

namespace App\Containers\AppSection\Discount\Traits;

trait IsResourceOwnerTrait
{
    public function isResourceOwner(): bool
    {
        $shopId = $this->decode(request()->shop_id);
        $user = auth()->user();
        $shop = $user->whereHas('shops', function ($query) use ($shopId) {
            return $query->where('id', $shopId);
        })->first();
        if ($shop) {
            return true;
        }

        return false;
    }
}
