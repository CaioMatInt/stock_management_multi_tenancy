<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    protected $companyRepository;

    public function __construct(CompanyRepositoryInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function index()
    {
        try {
            $responseData = $this->companyRepository->getAll();
            return response()->success(200, null, $responseData);
        }catch(\Exception $e){
            return response()->error($e->getStatusCode(), $e->getMessage());
        }catch(\Throwable $e){
            return response()->error($e->getStatusCode(), $e->getMessage());
        }

    }

    public function store(StoreCompanyRequest $request)
    {
        DB::beginTransaction();

        try {
            $responseData = $this->companyRepository->create($request->all());
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

    public function update(UpdateCompanyRequest $request, $id)
    {

        DB::beginTransaction();
        try {
            $responseData = $this->companyRepository->update($id, $request->all());
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

    public function show($id)
    {
        try{
            $responseData = $this->companyRepository->find($id);
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
            $this->companyRepository->delete($id);
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
