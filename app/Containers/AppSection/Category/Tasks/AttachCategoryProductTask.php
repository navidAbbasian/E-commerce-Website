<?php

namespace App\Containers\AppSection\Category\Tasks;

use App\Ship\Parents\Tasks\Task as ParentTask;

class AttachCategoryProductTask extends ParentTask
{
    public function run($product, $productCategories, $update = false)
    {
        if ($update) {
            $product->categories()->detach();
        }
        $pivotData = array_column($productCategories, 'id');
        $product->categories()->attach($pivotData);

        return true;
    }
}
