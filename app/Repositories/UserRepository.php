<?php

namespace App\Repositories;
use App\DataTransferObject\UserDTO;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(array $data, int $id): bool
    {
        return User::where('id',$id)->update($data);
    }

    public function get(int $id): User
    {
        return User::find($id);
    }
}
