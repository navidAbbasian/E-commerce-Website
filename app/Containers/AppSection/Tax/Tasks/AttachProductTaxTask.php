<?php

namespace App\Containers\AppSection\Tax\Tasks;

use App\Ship\Parents\Tasks\Task as ParentTask;

class AttachProductTaxTask extends ParentTask
{
    public function run($product, $productTax, $update = false)
    {
        if ($update) {
            $product->taxes()->detach();
        }
        $pivotData = array_column($productTax, 'id');
        $product->taxes()->attach($pivotData);

        return true;
    }
}
