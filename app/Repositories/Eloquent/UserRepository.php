<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getUserByTokenActivation(string $token) : User
    {
        $user = $this->model->where('token_activation', $token)->first();
        if (!$user) {
            throw new \Exception('User token not found', 404);
        }
        return $user;
    }

}
