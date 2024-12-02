<?php

namespace Modules\User\Services;

use Illuminate\Support\Facades\Event;
use Modules\User\DataTransferObjects\UserDTO;
use Modules\User\Models\User;
use Modules\User\Repositories\UserRepository;
use Prettus\Validator\Exceptions\ValidatorException;

class UserService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Crete User
     * @param UserDTO $userDTO
     * @return User
     * @throws ValidatorException
     */
    public function createUser(UserDTO $userDTO): User
    {
        $user = $this->userRepository->create((array)$userDTO);
        // Event for sending notifications etc.
        Event::dispatch('user.created.after', $user);
        return $user;
    }

    /**
     *  Get User by Email
    */
    public function getUserByEmail(string $email): User
    {
        return $this->userRepository->findByField('email', $email)->first();
    }
}
