<?php

namespace App\Containers\AppSection\Tag\Tasks;

use App\Ship\Parents\Tasks\Task as ParentTask;

class AttachProductTagTask extends ParentTask
{
    public function run($product, $productTags, $update = false)
    {
        if ($update) {
            $product->tags()->detach();
        }
        $pivotData = array_column($productTags, 'id');
        $product->tags()->attach($pivotData);

        return true;
    }
}
