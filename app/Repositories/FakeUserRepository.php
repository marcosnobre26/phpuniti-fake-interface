<?php

namespace Tests\Unit\API;

use App\DataTransferObject\UserDTO;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;

class FakeUserRepository implements UserRepositoryInterface
{
    public function create(UserDTO $userDTO): User
    {
    return new User($userDTO->toArray());
    }
}
