<?php

namespace App\Containers\AppSection\Product\Models;

use App\Containers\AppSection\Brand\Models\Brand;
use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Order\Models\OrderItem;
use App\Containers\AppSection\Shop\Models\Shop;
use App\Containers\AppSection\Tag\Models\Tag;
use App\Containers\AppSection\Tax\Models\Tax;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends ParentModel
{
    protected $guarded = [
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Product';

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function productAttributes(): HasMany
    {
        return $this->hasMany(ProductAttribute::class, 'product_id', 'id');
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'product_tag', 'product_id', 'tag_id');
    }

    public function taxes(): BelongsToMany
    {
        return $this->belongsToMany(Tax::class, 'product_tax', 'product_id', 'tax_id');
    }
}
