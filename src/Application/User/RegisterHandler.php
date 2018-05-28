<?php

namespace App\Application\User;


use App\Domain\User\Email;
use App\Domain\User\Entity\User;
use App\Domain\User\Password;
use App\Domain\User\Repository\UserRepository;

class RegisterHandler
{
    /**
     * @param RegisterCommand $command
     * @throws \App\Domain\User\Exception\InvalidUserIdentityException
     * @throws \App\Domain\User\Exception\InvalidRepeatedPasswordException
     * @throws \App\Domain\User\Exception\InvalidPasswordLengthException
     */
    public function handle(RegisterCommand $command): void
    {

        $userRepo = new UserRepository();
        $user = new User($userRepo->nextIdentity(), new Email($command->getEmail()), new Password($command->getPassword(), 'ble'));
        var_dump($user);
    }
}
