<?php

namespace App\Domain\User\Entity;

use App\Domain\User\Email;
use App\Domain\User\Password;
use App\Domain\User\UserId;

class User
{
    /**
     * @var UserId
     */
    private $userId;

    /**
     * @var  Password
     */
    private $password;

    /**
     * @var  Email
     */
    private $email;

    /**
     * @param UserId $userId
     * @param Email $email
     * @param Password $password
     */
    public function __construct(UserId $userId, Email $email, Password $password)
    {
        $this->userId = $userId;
        $this->email = $email;
        $this->password = $password;

    }
}
