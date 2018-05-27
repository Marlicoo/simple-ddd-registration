<?php

namespace App\Domain\User\Repository;


use App\Domain\User\Entity\User;
use App\Domain\User\UserId;

interface UserRepositoryInterface
{
    /**
     * @param UserId $userId
     *
     * @return User
     */
    public function ofId(UserId $userId);

    /**
     * @param string $email
     *
     * @return User
     */
    public function ofEmail($email);

    /**
     * @param User $user
     */
    public function add(User $user);

    /**
     * @return UserId
     */
    public function nextIdentity();
}