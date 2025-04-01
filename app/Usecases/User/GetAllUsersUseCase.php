<?php

namespace App\Usecases\User;

use App\DTOs\UserDTO;
use App\Repositories\Interfaces\UserRepositoryInterface;

class GetAllUsersUseCase
{
    protected $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function execute()
    {
        $users = $this->userRepositoryInterface->getAllUsers();

        $formattedUsers = $users->getCollection()->map(fn($user) => UserDTO::fromModel($user)->toArray());
        $users->setCollection(collect($formattedUsers));

        return $users;
    }
}
