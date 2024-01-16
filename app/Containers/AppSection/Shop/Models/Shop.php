<?php

namespace App\Containers\AppSection\Shop\Models;

use App\Containers\AppSection\Banner\Models\Banner;
use App\Containers\AppSection\Brand\Models\Brand;
use App\Containers\AppSection\Carousel\Models\Carousel;
use App\Containers\AppSection\Cart\Models\Cart;
use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Comment\Models\Comment;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Models\FavoriteItem;
use App\Containers\AppSection\Discount\Models\Discount;
use App\Containers\AppSection\Footer\Models\Footer;
use App\Containers\AppSection\Header\Models\Header;
use App\Containers\AppSection\Order\Models\Order;
use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\Shop\Enums\ShopStatusEnum;
use App\Containers\AppSection\ShoppingList\Models\ShoppingList;
use App\Containers\AppSection\Slider\Models\Slider;
use App\Containers\AppSection\Tag\Models\Tag;
use App\Containers\AppSection\Tax\Models\Tax;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\WishList\Models\WishList;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shop extends ParentModel
{
    protected $guarded = [
    ];

    protected $hidden = [
    ];

    protected $casts = [
        'status' => ShopStatusEnum::class,
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Shop';

    public function domains(): HasMany
    {
        return $this->hasMany(Domain::class, 'shop_id', 'id');
    }

    public function headers(): HasMany
    {
        return $this->hasMany(Header::class, 'shop_id', 'id');
    }

    public function footers(): HasMany
    {
        return $this->hasMany(Footer::class, 'shop_id', 'id');
    }

    public function banners(): HasMany
    {
        return $this->hasMany(Banner::class, 'shop_id', 'id');
    }

    public function brands(): HasMany
    {
        return $this->hasMany(Brand::class, 'shop_id', 'id');
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class, 'shop_id', 'id');
    }

    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class, 'shop_id', 'id');
    }

    public function carousels(): HasMany
    {
        return $this->hasMany(Carousel::class, 'shop_id', 'id');
    }

    public function taxes(): HasMany
    {
        return $this->hasMany(Tax::class, 'shop_id', 'id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'shop_id', 'id');
    }

    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class, 'shop_id', 'id');
    }

    public function discounts(): HasMany
    {
        return $this->hasMany(Discount::class, 'shop_id', 'id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'shop_id', 'id');
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class, 'shop_id', 'id');
    }

    public function wishLists(): HasMany
    {
        return $this->hasMany(WishList::class, 'shop_id', 'id');
    }

    public function shoppingLists(): HasMany
    {
        return $this->hasMany(ShoppingList::class, 'shop_id', 'id');
    }

    public function favoriteLists(): HasMany
    {
        return $this->hasMany(FavoriteItem::class, 'shop_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'shop_id', 'id');
    }

    public function sliders(): HasMany
    {
        return $this->hasMany(Slider::class, 'shop_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
