<?php
declare(strict_types=1);

namespace App\Services;

use App\DTO\User\CreateUserDTO;
use App\Exceptions\Users\NotFoundException;
use App\Models\User;

/**
 * Class UserService.
 *
 * @package App\Services
 * @author DaKoshin.
 */
final class UserService
{
    /**
     * Create user.
     *
     * @param CreateUserDTO $createUserDTO
     * @return User
     */
    public function create(CreateUserDTO $createUserDTO): User
    {
        return User::create([
            'name' => $createUserDTO->getName(),
            'email' => $createUserDTO->getEmail(),
            'password' => $createUserDTO->getPassword(),
        ]);
    }

    /**
     * Get user by email.
     *
     * @param string $email
     * @return User
     */
    public function getUserByEmail(string $email): User
    {
        $user = User::whereEmail($email)->first();

        if (!$user) {
            throw new NotFoundException;
        }

        return User::whereEmail($email)->first();
    }
}
