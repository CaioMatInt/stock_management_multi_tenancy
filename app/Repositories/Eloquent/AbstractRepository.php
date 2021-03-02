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

    protected function resolveModel(){
        return app($this->model);
    }

    public function getAndSelectSpecificFields(array $fields, array $params){
        if($params){
            return $this->model->select($fields)->where($params)->get();

        }
        return $this->model->select($fields)->get();
    }

    public function findAndSelectSpecificFields(array $fields, $id){

        return $this->model->select($fields)->find($id);
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

    public function getAllPaginated(array $records_per_page)
    {
        return $this->model->paginate($records_per_page);
    }

    public function getAllPaginatedWithRelationships(int $records_per_page, array $relationships)
    {
        return $this->model->with($relationships)->paginate($records_per_page);
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function findWhere(string $field, $value)
    {
        return $this->model->where($field, $value)->first();
    }

    public function findMultipleWhere(array $params)
    {
        $builder = $this->model;

        foreach($params as $param){
            $builder->where($param['field'], $param['value']);
        }

        return $builder->first();
    }

    public function findMultipleWhereAndMultipleConditional(array $params)
    {
        $builder = $this->model;

        foreach($params as $param){
            $builder = $builder->where($param['field'], $param['conditional'] , $param['value']);
        }
        return $builder->get();
    }


    public function findWithRelationships(int $id, array $relationships)
    {
        return $this->model->with($relationships)->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id,array $data)
    {
        $model = $this->model->find($id);

        return is_null($model) ? $model : $model->update($data);

    }

    public function delete(int $id)
    {
        return $this->model->find($id)->delete();
    }

    public function count(){
        return $this->model->get()->count();
    }

    //This function find one element by some field and value
    public function getIdBySlug(string $slug)
    {
        return $this->model->select('id')->where('slug', $slug)->first()->id;
    }

    //This function find one element by some field and value
    public function getSlugById(int $id)
    {
        return $this->model->find($id)->slug;
    }

}
