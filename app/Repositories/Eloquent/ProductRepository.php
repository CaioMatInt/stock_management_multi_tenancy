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
        $data['company_id'] = auth()->user()->company_id;
        return $this->model->create($data);
    }

    public function createByJob(array $data, int $userId, int $companyId)
    {
        $data['user_id'] = $userId;
        $data['company_id'] = $companyId;
        return $this->model->create($data);
    }

    public function updateByJob(int $productId, array $data, int $userId)
    {
        $data['user_id'] = $userId;
        if(isset($data['company_id'])) {
            array_unshift($data['company_id']);
        }
        $this->model->find($productId)->update($data);
    }


    public function findBySku(string $sku)
    {
        return $this->model->where('sku', $sku)->first();
    }
}
