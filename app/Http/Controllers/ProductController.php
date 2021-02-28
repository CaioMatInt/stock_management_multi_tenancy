<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Jobs\Product\HandleStoreProduct;
use App\Jobs\Product\HandleUpdateProduct;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Services\ProductService;
use Illuminate\Support\Facades\DB;

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
            return response()->error(null, $e->getMessage());
        }catch(\Throwable $e){
            return response()->error(null, $e->getMessage());
        }

    }

    public function store(StoreProductRequest $request)
    {
        HandleStoreProduct::dispatch($request->products);
        return response()->success(200, 'Products were sent to a queue');
    }

    public function show($id)
    {
        try{
            $responseData = $this->productRepository->find($id);
            return response()->success(200, null, $responseData);
        }catch(\Exception $e){
            return response()->error(null, $e->getMessage());
        }catch(\Throwable $e){
            return response()->error(null, $e->getMessage());
        }
    }

    public function update(UpdateProductRequest $request, $id)
    {
        HandleUpdateProduct::dispatch($request->products);
        return response()->success(200, 'Products to update were sent to a queue');
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
            return response()->error(null, $e->getMessage());
        }catch(\Throwable $e){
            DB::rollBack();
            return response()->error(null, $e->getMessage());
        }
    }
}
