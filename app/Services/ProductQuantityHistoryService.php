<?php

namespace App\Services;

use App\Repositories\Contracts\ProductQuantityHistoryRepositoryInterface;

class ProductQuantityHistoryService
{

    protected $productQuantityHistoryRepository;

    public function __construct(ProductQuantityHistoryRepositoryInterface $productQuantityHistoryRepository)
    {
        $this->productQuantityHistoryRepository = $productQuantityHistoryRepository;
    }

}
