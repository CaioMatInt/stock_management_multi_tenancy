<?php

namespace App\Repositories\Contracts;

interface AbstractRepositoryInterface
{
    public function getAll();

    public function getAndSelectSpecificFields(array $fields, array $params);

    public function findAndSelectSpecificFields(array $fields, $id);

    public function getIn($key, array $values);

    public function getAllWithRelationships(array $relationships);

    public function getAllPaginated(array $records_per_page);

    public function getAllPaginatedWithRelationships(int $records_per_page, array $relationships);

    public function find(int $id);

    public function findWhere(string $field, $value);

    public function findWithRelationships(int $id, array $relationships);

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);

    public function count();

/*    public function getIdBySlug(string $slug);

    public function getSlugById(int $id);*/

    public function findMultipleWhere(array $params);

    public function findMultipleWhereAndMultipleConditional(array $params);

    public function getARandomRowId();

    public function getARandomRow();



}
