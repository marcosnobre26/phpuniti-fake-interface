<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use App\DataTransferObject\UserDTO;

class UserService
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(array $userData)
    {
        return $this->userRepository->create($userData);
    }

    public function update(array $userData, int $id)
    {
        if($this->userRepository->update($userData, $id))
        {
            return $this->userRepository->get($id);
        }
    }
}
