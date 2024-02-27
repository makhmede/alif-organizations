<?php

namespace App\Contracts;

use App\Models\User;

interface IUserRepository
{
    public function getUserById(int $userId): ?User;
}
