<?php

namespace App\Domain\User\Repository;


use App\Domain\User\Entity\User;
use App\Domain\User\InvalidUserIdentityException;
use App\Domain\User\UserId;

class UserRepository implements UserRepositoryInterface
{
    public function ofId(UserId $userId)
    {
        // TODO: Implement ofId() method.
    }

    public function ofEmail($email)
    {
        // TODO: Implement ofEmail() method.
    }

    public function add(User $user)
    {
        // TODO: Implement add() method.
    }

    /**
     * @return UserId
     * @throws InvalidUserIdentityException
     */
    public function nextIdentity(): UserId
    {
        return new UserId();
    }

}