<?php

namespace App\Domain\User\Repository;


use App\Domain\User\Entity\User;
use App\Domain\User\ValueObject\Email;
use App\Domain\User\ValueObject\UserId;

interface UserRepositoryInterface
{
    /**
     * @param UserId $userId
     *
     * @return User
     */
    public function byId(UserId $userId): User;

    /**
     * @param string $email
     *
     * @return User
     */
    public function byEmail($email): User;

    /**
     * @param User $user
     */
    public function add(User $user);

    /**
     * @return UserId
     */
    public function nextIdentity(): UserId;

    /**
     * @param Email $email
     * @return bool
     */
    public function emailUnique(Email $email):bool;
}
