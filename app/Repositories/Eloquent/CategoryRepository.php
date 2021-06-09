<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository extends AbstractRepository implements CategoryRepositoryInterface
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        $data['user_id'] = auth()->user()->id;
        $data['company_id'] = auth()->user()->company_id;
        return $this->model->create($data);
    }

    public function update(int $id,array $data)
    {
        $data['user_id'] = auth()->user()->id;
        $data['company_id'] = auth()->user()->company_id;
        $model = $this->model->find($id);
        if(is_null($model)){
            return $model;
        }
        $model->update($data);
        return $model;
    }
}
