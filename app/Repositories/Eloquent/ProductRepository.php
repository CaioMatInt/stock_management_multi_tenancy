<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository extends AbstractRepository implements ProductRepositoryInterface
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        $data['user_id'] = auth()->user()->id;
        return $this->model->create($data);
    }

    public function findBySku(string $sku)
    {
        return $this->model->where('sku', $sku)->first();
    }
}
