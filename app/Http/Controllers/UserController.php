<?php

namespace App\Http\Controllers;

use App\DTOs\UserDTO;
use App\Http\Requests\UserRequest;
use App\Usecases\User\CreateUserUseCase;
use App\Usecases\User\GetAllUsersUseCase;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $getAllUsersUseCase;
    protected $createUserUseCase;

    public function __construct(
        GetAllUsersUseCase $getAllUsersUseCase,
        CreateUserUseCase $createUserUseCase
    ) {
        $this->createUserUseCase = $createUserUseCase;
        $this->getAllUsersUseCase = $getAllUsersUseCase;
    }

    public function createUser(UserRequest $userRequest)
    {
        $userDTO = UserDTO::fromRequest($userRequest->validated());
        $user = $this->createUserUseCase->execute($userDTO);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user,
        ], 201);
    }

    public function getAllUsers()
    {
        $users = $this->getAllUsersUseCase->execute();

        return response()->json([
            'message' => 'Users retrieved successfully',
            'users' => $users,
        ], 200);
    }
}
