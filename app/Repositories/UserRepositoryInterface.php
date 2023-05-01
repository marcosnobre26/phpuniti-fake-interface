<?php

namespace App\Repositories;
use App\DataTransferObject\UserDTO;
use App\Models\User;

interface UserRepositoryInterface
{
    public function create(array $data): User;
    public function update(array $data, int $id): bool;
    public function get(int $id): User;
}
