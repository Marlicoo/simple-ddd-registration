<?php

namespace App\Domain\User\Entity;

use App\Domain\User\ValueObject\Email;
use App\Domain\User\ValueObject\Password;
use App\Domain\User\ValueObject\UserId;

class User
{
    /**
     * @var UserId
     */
    private $userId;

    /**
     * @var Password
     */
    private $password;

    /**
     * @var Email
     */
    private $email;

    /**
     * @var string
     */
    private $username;

    /**
     * @param UserId $userId
     * @param Email $email
     * @param Password $password
     * @param string $username
     * @return User
     */
    public static function register(UserId $userId, Email $email, Password $password, string $username): User
    {
        return new self($userId, $email, $password, $username);
    }

    /**
     * @param UserId $userId
     * @param Email $email
     * @param Password $password
     * @param string $username
     */
    public function __construct(UserId $userId, Email $email, Password $password, string $username)
    {
        $this->userId = $userId;
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;

    }
}
