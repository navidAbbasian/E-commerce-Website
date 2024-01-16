<?php

namespace App\Containers\AppSection\Customer\UI\API\Transformers;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Discount\UI\API\Transformers\DiscountTransformer;
use App\Containers\AppSection\Order\UI\API\Transformers\OrderTransformer;
use App\Containers\AppSection\Shop\UI\API\Transformers\ShopTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class CustomerTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [
    ];

    protected array $availableIncludes = [
    ];

    public function transform(Customer $customer): array
    {
        $response = [
            'object' => $customer->getResourceKey(),
            'id' => $customer->getHashedKey(),
            'shop_id' => $customer->encode($customer->shop_id),
            'firstname' => $customer->firstname,
            'lastname' => $customer->lastname,
            'mobile' => $customer->mobile,
            'phone' => $customer->phone,
            'email' => $customer->email,
            'national_code' => $customer->national_code,
            'email_verified_at' => $customer->email_verified_at,
            'password' => $customer->password,
            'gender' => $customer->gender,
            'birth' => $customer->birth,
            'newsletter' => $customer->newsletter,
            'score' => $customer->score,
            'refund_card' => $customer->refund_card,
            'referral_link' => $customer->referral_link,
            'status' => $customer->status,
        ];

        return $this->ifAdmin([
            'real_id' => $customer->id,
            'created_at' => $customer->created_at,
            'updated_at' => $customer->updated_at,
            'readable_created_at' => $customer->created_at->diffForHumans(),
            'readable_updated_at' => $customer->updated_at->diffForHumans(),
            // 'deleted_at' => $customer->deleted_at,
        ], $response);
    }

    public function includeShop(Customer $customer)
    {
        return $this->item($customer->shop, new ShopTransformer());
    }
    public function includeAddresses(Customer $customer)
    {
        return $this->collection($customer->addresses, new CustomerAddressTransformer());
    }
    public function includeFavorites(Customer $customer)
    {
        return $this->collection($customer->favorites, new FavoriteItemTransformer());
    }
    public function includeDiscounts(Customer $customer)
    {
        return $this->collection($customer->discounts, new DiscountTransformer());
    }
    public function includOrders(Customer $customer)
    {
        return $this->collection($customer->orders, new OrderTransformer());
    }

}
