<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $userService;
    protected $userRepository;

    public function __construct(UserService $userService, UserRepositoryInterface $userRepository)
    {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
    }

    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();

        try{
            $data = $request->all();
            $responseData = $this->userRepository->create($data);
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
            $responseData = $this->userRepository->update($id, $data);
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
