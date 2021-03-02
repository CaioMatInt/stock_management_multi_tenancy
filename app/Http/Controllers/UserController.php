<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $userService;
    protected $userRepository;
    protected $companyRepository;

    public function __construct(UserService $userService, UserRepositoryInterface $userRepository, CompanyRepositoryInterface $companyRepository)
    {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
        $this->companyRepository = $companyRepository;
    }

    public function index()
    {
        try {
            $responseData = $this->userRepository->getAll();
            return response()->success(200, null, $responseData);
        }catch(\Exception $e){
            return response()->error(null, $e->getMessage());
        }catch(\Throwable $e){
            return response()->error(null, $e->getMessage());
        }

    }

    public function register(StoreUserRequest $request)
    {
        DB::beginTransaction();

        try{
            $data = $request->all();

            if(is_null($this->companyRepository->find($request->company_id))){
                return response()->error(404, 'Company not found');
            }

            $responseData = $this->userService->create($data);
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

    public function showLoggedUserData()
    {
        try{
            $responseData = $this->userRepository->find(auth()->user()->id);
            return response()->success(200, null, $responseData);
        }catch(\Exception $e){
            return response()->error(null, $e->getMessage());
        }catch(\Throwable $e){
            return response()->error(null, $e->getMessage());
        }
    }

    public function update(UpdateUserRequest $request, $id)
    {
        DB::beginTransaction();
        try{
            $data = $request->all();
            $responseData = $this->userService->update($id, $data);
            DB::commit();
            return response()->success(200, null, $responseData);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->error(null, $e->getMessage());
        }catch(\Throwable $e){
            DB::rollBack();
            return response()->error(null, $e->getMessage());
        }
    }

    public function accountConfirmation($token)
    {
        DB::beginTransaction();
        try {
            $user = $this->userService->accountConfirmation($token);
            DB::commit();
            return response()->success();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->error(null, $e->getMessage());
        }
    }

}
