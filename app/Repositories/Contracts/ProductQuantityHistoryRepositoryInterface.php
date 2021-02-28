<?php

namespace App\Repositories\Contracts;

interface ProductQuantityHistoryRepositoryInterface extends AbstractRepositoryInterface
{
    public function getByProductId(int $productId);
}
