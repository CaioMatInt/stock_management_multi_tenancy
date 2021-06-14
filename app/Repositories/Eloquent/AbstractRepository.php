<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->resolveModel();
    }

    protected function resolveModel()
    {
        return app($this->model);
    }

    public function getARandomRowId(): int
    {
        return $this->model::inRandomOrder()->take(1)->first()->id;
    }

    public function getARandomRow()
    {
        return $this->model::inRandomOrder()->take(1)->first();
    }

    public function getAndSelectSpecificFields(array $fields, array $params = [])
    {
        if($params){
            return $this->model->select($fields)->where($params)->get();
        }
        return $this->model->select($fields)->get();
    }

    public function getAll()
    {
        return $this->model->get();
    }

    public function getIn($key, array $values)
    {
        return $this->model->whereIn($key, $values)->get();
    }

    public function getAllWithRelationships(array $relationships)
    {
        return $this->model->with($relationships)->get();
    }

    public function getAllPaginated($records_per_page)
    {
        return $this->model->paginate($records_per_page);
    }

    public function getAllPaginatedWithRelationships(int $records_per_page, array $relationships)
    {
        return $this->model->with($relationships)->paginate($records_per_page);
    }

    public function getMultipleWhereAndMultipleConditional(array $params)
    {
        $builder = $this->model;
        foreach($params as $param){
            $builder = $builder->where($param['field'], $param['conditional'] , $param['value']);
        }
        return $builder->get();
    }

    public function find(int $id)
    {
        $model = $this->model->find($id);
        if(is_null($model)){
            throw new \Error($this->getResourceName() . ' not found', 404);
        }
        return $model;
    }

    public function findWhere(string $field, $value)
    {
        $model = $this->model->where($field, $value)->first();
        if(is_null($model)){
            throw new \Error($this->getResourceName() . ' not found', 404);
        }
        return $model;
    }

    public function findMultipleWhere(array $params)
    {
        $builder = $this->model;
        foreach($params as $param){
            $builder->where($param['field'], $param['value']);
        }

        $model = $builder->first();
        if(is_null($model)){
            throw new \Error($this->getResourceName() . ' not found', 404);
        }
        return $model;
    }

    public function findAndSelectSpecificFields(array $fields, $id)
    {
        $model = $this->model->select($fields)->find($id);
        if(is_null($model)){
            throw new \Error($this->getResourceName() . ' not found', 404);
        }
        return $model;
    }


    public function findWithRelationships(int $id, array $relationships)
    {
        $model = $this->model->with($relationships)->find($id);
        if(is_null($model)){
            throw new \Error($this->getResourceName() . ' not found', 404);
        }
        return $model;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id,array $data)
    {
        $model = $this->model->find($id);
        if(is_null($model)){
            throw new \Error($this->getResourceName() . ' not found', 404);
        }
        $model->update($data);
        return $model;
    }

    public function delete(int $id)
    {
        $model = $this->model->find($id);
        if(is_null($model)){
            throw new \Error($this->getResourceName() . ' not found', 404);
        }
        return $model->delete();
    }

    public function count()
    {
        return $this->model->count();
    }

    public function getResourceName(): string
    {
        $className = (new \ReflectionClass($this))->getShortName();
        return str_replace("Repository", "", $className);
    }
}
