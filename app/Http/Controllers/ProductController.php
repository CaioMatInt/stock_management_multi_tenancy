<?php

namespace App\Http\Controllers;

use App\Http\Requests\BulkStoreProductRequest;
use App\Http\Requests\BulkUpdateProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Jobs\Product\HandleStoreProduct;
use App\Jobs\Product\HandleUpdateProduct;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Eloquent\ProductRepository;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    protected $productService;
    protected $productRepository;

    public function __construct(ProductService $productService, ProductRepositoryInterface $productRepository)
    {
        $this->productService = $productService;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        try {
            $responseData = $this->productRepository->getAll();
            return response()->success(200, null, $responseData);
        }catch(\Exception $e){
            return response()->error($e->getStatusCode(), $e->getMessage());
        }catch(\Throwable $e){
            return response()->error($e->getStatusCode(), $e->getMessage());
        }

    }

    public function bulkStore(BulkStoreProductRequest $request)
    {
        HandleStoreProduct::dispatch(resolve(ProductRepository::class), $request->products, auth()->user()->id, auth()->user()->company_id);
        return response()->success(200, 'Products were sent to a queue');
    }

    public function store(StoreProductRequest $request)
    {
        DB::beginTransaction();
        try {
            $responseData = $this->productRepository->create($request->all());
            DB::commit();
            return response()->success(200, null, $responseData);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->error($e->getStatusCode(), $e->getMessage());
        }catch(\Throwable $e){
            DB::rollBack();
            return response()->error($e->getStatusCode(), $e->getMessage());
        }
    }

    public function update(UpdateProductRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $responseData = $this->productRepository->update($id, $request->all());
            DB::commit();
            return response()->success(200, null, $responseData);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->error($e->getStatusCode(), $e->getMessage());
        }catch(\Throwable $e){
            DB::rollBack();
            return response()->error($e->getStatusCode(), $e->getMessage());
        }
    }

    public function bulkUpdate(Request $request)
    {
        $validatorRequest = new BulkUpdateProductRequest();
        Validator::make($request->all(), $validatorRequest->rules($request->products))->validate();
        HandleUpdateProduct::dispatch(resolve(ProductRepository::class), $request->products, auth()->user()->id);
        return response()->success(200, 'Products to update were sent to a queue');
    }


    public function show($id)
    {
        try{
            $responseData = $this->productRepository->find($id);
            return response()->success(200, null, $responseData);
        }catch(\Exception $e){
            return response()->error($e->getCode(), $e->getMessage());
        }catch(\Throwable $e){
            return response()->error($e->getCode(), $e->getMessage());
        }
    }


    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            $this->productRepository->delete($id);
            DB::commit();
            return response()->success(200, null);
        }catch( \Exception $e){
            DB::rollBack();
            return response()->error($e->getStatusCode(), $e->getMessage());
        }catch(\Throwable $e){
            DB::rollBack();
            return response()->error($e->getStatusCode(), $e->getMessage());
        }
    }
}
