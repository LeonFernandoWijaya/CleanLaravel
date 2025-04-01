<?php

namespace App\Usecases\User;

use App\DTOs\UserDTO;
use App\Repositories\Interfaces\UserRepositoryInterface;

class CreateUserUseCase
{
    protected $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function execute(UserDTO $userDTO)
    {
        $userData = [
            'name' => $userDTO->name,
            'email' => $userDTO->email,
            'password' => bcrypt($userDTO->password),
        ];

        return $this->userRepositoryInterface->createUser($userData);
    }
}
