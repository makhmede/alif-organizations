<?php

namespace App\Repositories;

use App\Contracts\IUserRepository;
use App\DTO\UserDTO;
use App\Models\User;

class UserRepository implements IUserRepository
{
    public function getUserById(int $userId): ?User
    {
        /** @var User|null $user */
        // TODO: Implement getUserById() method.
        $user = User::query()->find($userId);

        return $user;
    }

    public function create(UserDTO $userDTO): User
    {
        $user = new User();
        $user->name = $userDTO->getName();
        $user->surname = $userDTO->getSurname();
        $user->email = $userDTO->getEmail();
        $user->dateOfBirth = $userDTO->getDateOfBirth();
        $user->save();

        return $user;
    }

    public function update($id, array $data)
    {
        $user = User::find($id);
        $user->update($data);
        return $user;
    }

    public function destroy($id)
    {
        return User::destroy($id);
    }
}
