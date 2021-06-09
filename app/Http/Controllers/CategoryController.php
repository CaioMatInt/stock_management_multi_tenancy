<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Services\CategoryService;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    protected $categoryService;
    protected $categoryRepository;

    public function __construct(CategoryService $categoryService, CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryService = $categoryService;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        try {
            $responseData = $this->categoryRepository->getAll();
            return response()->success(200, null, $responseData);
        }catch(\Exception $e){
            return response()->error($e->getStatusCode(), $e->getMessage());
        }catch(\Throwable $e){
            return response()->error($e->getStatusCode(), $e->getMessage());
        }

    }

    public function store(StoreCategoryRequest $request)
    {

        DB::beginTransaction();

        try {
            $responseData = $this->categoryRepository->create($request->all());
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

    public function update(UpdateCategoryRequest $request, $id)
    {

        DB::beginTransaction();
        try {
            $responseData = $this->categoryRepository->update($id, $request->all());
            DB::commit();
            return response()->success(200, null, $responseData);
        }catch(\Exception $e){
            dd($e);
            DB::rollBack();
            return response()->error($e->getStatusCode(), $e->getMessage());
        }catch(\Throwable $e){
            dd($e);
            DB::rollBack();
            return response()->error($e->getStatusCode(), $e->getMessage());
        }
    }

    public function show($id)
    {
        try{
            $responseData = $this->categoryRepository->find($id);
            return response()->success(200, null, $responseData);
        }catch(\Exception $e){
            return response()->error($e->getStatusCode(), $e->getMessage());
        }catch(\Throwable $e){
            return response()->error($e->getStatusCode(), $e->getMessage());
        }
    }


    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            $this->categoryRepository->delete($id);
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
