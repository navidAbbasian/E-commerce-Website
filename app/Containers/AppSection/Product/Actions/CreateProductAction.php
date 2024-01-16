<?php

namespace App\Containers\AppSection\Product\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Category\Tasks\AttachCategoryProductTask;
use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\Product\Tasks\CreateProductTask;
use App\Containers\AppSection\Product\UI\API\Requests\CreateProductRequest;
use App\Containers\AppSection\Tag\Tasks\AttachProductTagTask;
use App\Containers\AppSection\Tax\Tasks\AttachProductTaxTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateProductAction extends ParentAction
{
    public function __construct(
        private readonly CreateProductTask $createProductTask,
        private readonly AttachCategoryProductTask $attachCategoryProductTask,
        private readonly AttachProductTagTask $attachProductTagTask,
        private readonly AttachProductTaxTask $attachProductTaxTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateProductRequest $request): Product
    {
        $data = $request->sanitizeInput([
            'shop_id',
            'brand_id',
            'title',
            'meta_title',
            'description',
            'meta_description',
            'price',
            'weight',
            'length',
            'width',
            'height',
            'quantity',
            'score',
            'status',
            'categories',
            'tags',
            'taxes',
        ]);

        if (isset($data['categories'])) {
            $productCategories = $data['categories'];
            unset($data['categories']);
        } else {
            $productCategories = [];
        }
        if (isset($data['tags'])) {
            $productTags = $data['tags'];
            unset($data['tags']);
        } else {
            $productTags = [];
        }
        if (isset($data['taxes'])) {
            $productTax = $data['taxes'];
            unset($data['taxes']);
        } else {
            $productTax = [];
        }

        $product = $this->createProductTask->run($data);

        $this->attachCategoryProductTask->run($product, $productCategories, true);
        $this->attachProductTagTask->run($product, $productTags, true);
        $this->attachProductTaxTask->run($product, $productTax, true);

        return $product;
    }
}
