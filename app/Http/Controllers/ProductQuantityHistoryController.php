<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductQuantityHistoryRequest;
use App\Repositories\Contracts\ProductQuantityHistoryRepositoryInterface;
use App\Services\ProductQuantityHistoryService;
use Illuminate\Support\Facades\DB;

class ProductQuantityHistoryController extends Controller
{
    protected $productQuantityHistoryService;
    protected $productQuantityHistoryRepository;

    public function __construct(ProductQuantityHistoryService $productQuantityHistoryService, ProductQuantityHistoryRepositoryInterface $productQuantityHistoryRepository)
    {
        $this->productQuantityHistoryService = $productQuantityHistoryService;
        $this->productQuantityHistoryRepository = $productQuantityHistoryRepository;
    }

    public function index()
    {
        try {
            $responseData = $this->productQuantityHistoryRepository->getAll();
            return response()->success(200, null, $responseData);
        }catch(\Exception $e){
            return response()->error($e->getStatusCode(), $e->getMessage());
        }catch(\Throwable $e){
            return response()->error($e->getStatusCode(), $e->getMessage());
        }

    }

    public function getByProductId($productId)
    {
        try {
            $responseData = $this->productQuantityHistoryRepository->getByProductId($productId);
            return response()->success(200, null, $responseData);
        }catch(\Exception $e){
            return response()->error($e->getStatusCode(), $e->getMessage());
        }catch(\Throwable $e){
            return response()->error($e->getStatusCode(), $e->getMessage());
        }

    }

}
