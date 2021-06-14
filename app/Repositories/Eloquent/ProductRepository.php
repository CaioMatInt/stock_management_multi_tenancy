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
        $createdProduct = parent::create($data);
        if($data['categoriesArray']) {
            $createdProduct->categories()->sync($data['categoriesArray']);
        }
        return $createdProduct;
    }

    public function createByJob(array $data, int $userId, int $companyId)
    {
        $data['user_id'] = $userId;
        $data['company_id'] = $companyId;
        $createdProduct = parent::create($data);
        if($data['categoriesArray']) {
            $createdProduct->categories()->sync($data['categoriesArray']);
        }
        return $createdProduct;
    }

    public function update(int $id,array $data)
    {
        $data['user_id'] = auth()->user()->id;
        $data['company_id'] = auth()->user()->company_id;
        $model = parent::update($id, $data);
        if($data['categoriesArray']) {
            $model->categories()->sync($data['categoriesArray']);
        }
        return $model;
    }

    public function updateByJob(int $id, array $data, int $userId)
    {
        $data['user_id'] = $userId;
        if(isset($data['company_id'])) {
            array_unshift($data['company_id']);
        }
        $model = parent::update($id, $data);
        if($data['categoriesArray']) {
            $model->categories()->sync($data['categoriesArray']);
        }
        return $model;
    }


    public function findBySku(string $sku)
    {
        return $this->model->where('sku', $sku)->first();
    }

    public function getIdBySlug(string $slug)
    {
        return $this->model->select('id')->where('slug', $slug)->first()->id;
    }

    public function getSlugById(int $id)
    {
        return $this->model->find($id)->slug;
    }
}
