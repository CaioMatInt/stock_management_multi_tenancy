<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Carbon\Carbon;

class UserService
{

    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function accountConfirmation(string $token) : bool
    {
        $user = $this->userRepository->getUserByTokenActivation($token);

        if ($user->email_verified_at) {
            throw new \Exception('User is already active', 500);
        }
        return $this->activeNewUserByTokenActivation($user);
    }

    public function activeNewUserByTokenActivation(int $userId) : bool
    {
        $prepare['email_verified_at'] = Carbon::now();
        return $this->userRepository->update($userId, $prepare);
    }
}
