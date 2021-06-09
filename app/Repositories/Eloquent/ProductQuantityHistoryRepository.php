<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Models\ProductQuantityHistory;
use App\Repositories\Contracts\ProductQuantityHistoryRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductQuantityHistoryRepository extends AbstractRepository implements ProductQuantityHistoryRepositoryInterface
{
    protected $model;

    public function __construct(ProductQuantityHistory $model)
    {
        $this->model = $model;
    }

    public function getByProductId(int $productId)
    {
        return $this->model->where('product_id', $productId)->get();
    }

    public function findLastProductUpdateByProductId(int $productId)
    {
        return $this->model->where('product_id', $productId)->orderBy('updated_at', 'desc')->first();
    }
}
