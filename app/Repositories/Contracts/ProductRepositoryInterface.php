<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface extends AbstractRepositoryInterface
{
    public function findBySku(string $sku);
}
