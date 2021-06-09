<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface extends AbstractRepositoryInterface
{
    public function findBySku(string $sku);
    public function getIdBySlug(string $slug);
    public function getSlugById(int $id);
}
