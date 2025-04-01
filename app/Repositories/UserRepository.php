<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAllUsers($perPage = 5)
    {
        return $this->user->paginate($perPage);
    }

    public function getUserById($id)
    {
        return $this->user->find($id);
    }

    public function createUser(array $data)
    {
        return $this->user->create($data);
    }

    public function updateUser($id, array $data)
    {
        $user = $this->getUserById($id);
        if ($user) {
            $user->update($data);
            return $user;
        }
        return null;
    }

    public function deleteUser($id)
    {
        $user = $this->getUserById($id);
        if ($user) {
            return $user->delete();
        }
        return false;
    }
}
