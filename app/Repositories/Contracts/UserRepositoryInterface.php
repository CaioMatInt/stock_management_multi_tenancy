<?php

namespace App\Repositories\Contracts;

use App\Models\User;

interface UserRepositoryInterface extends AbstractRepositoryInterface
{
    public function getUserByTokenActivation(string $token);
}
