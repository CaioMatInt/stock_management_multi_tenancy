<?php

namespace App\Repositories\Eloquent;

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

    public function getAllWithRelationships($relationships)
    {
        return $this->model->with($relationships)->get();
    }

    public function getAllPaginated($records_per_page)
    {
        return $this->model->paginate($records_per_page);
    }

    public function getAllPaginatedWithRelationships($records_per_page, $relationships)
    {
        return $this->model->with($relationships)->paginate($records_per_page);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findWhere($field, $value)
    {
        return $this->model->where($field, $value)->first();
    }

    public function findWithRelationships($id, $relationships)
    {
        return $this->model->with($relationships)->find($id);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $this->model->find($id)->update($data);
        return $this->model->find($id);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    public function count(){
        return $this->model->get()->count();
    }

    //This function find one element by some field and value
    public function getIdBySlug($slug)
    {
        return $this->model->select('id')->where('slug', $slug)->first()->id;
    }

    //This function find one element by some field and value
    public function getSlugById($id)
    {
        return $this->model->find($id)->slug;
    }

}
