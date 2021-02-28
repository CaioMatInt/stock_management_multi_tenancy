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
            return response()->error(null, $e->getMessage());
        }catch(\Throwable $e){
            return response()->error(null, $e->getMessage());
        }

    }

    public function store(StoreProductQuantityHistoryRequest $request)
    {
        DB::beginTransaction();

        try{
            $data = $request->all();
            $responseData = $this->productQuantityHistoryRepository->create($data);
            DB::commit();
            return response()->success(200, null, $responseData);
        }catch(\Exception $e) {
            DB::rollback();
            return response()->error(null, $e->getMessage());
        }catch(\Throwable $e){
            DB::rollback();
            return response()->error(null, $e->getMessage());
        }
    }

    public function show($id)
    {
        try{
            $responseData = $this->productQuantityHistoryRepository->find($id);
            return response()->success(200, null, $responseData);
        }catch(\Exception $e){
            return response()->error(null, $e->getMessage());
        }catch(\Throwable $e){
            return response()->error(null, $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try{
            $this->productQuantityHistoryRepository->delete($id);
            DB::commit();
            return response()->success(200, null);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->error(null, $e->getMessage());
        }catch(\Throwable $e){
            DB::rollBack();
            return response()->error(null, $e->getMessage());
        }
    }
}
