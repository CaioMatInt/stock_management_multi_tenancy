<?php

namespace App\Repositories\Contracts;

interface AbstractRepositoryInterface
{
    public function getAll();

    public function getAndSelectSpecificFields(array $fields, array $params);

    public function findAndSelectSpecificFields(array $fields, $id);

    public function getIn($key, array $values);

    public function getAllWithRelationships($relationships);

    public function getAllPaginated($records_per_page);

    public function getAllPaginatedWithRelationships($records_per_page, $relationships);

    public function find($id);

    public function findWhere($field, $value);

    public function findWithRelationships($id, $relationships);

    public function create($data);

    public function update($id, $data);

    public function delete($id);

    public function count();

    public function getIdBySlug($slug);

    public function getSlugById($id);


}
