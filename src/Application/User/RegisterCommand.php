<?php

namespace App\Application\User;


use App\Application\Command;

class RegisterCommand implements Command
{

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $repeatedPassword;

    /**
     * UserRegisterCommand constructor.
     * @param string $email
     * @param string $password
     * @param string $repeatedPassword
     */
    public function __construct(string $email, string $password, string $repeatedPassword)
    {
        $this->email = $email;
        $this->password = $password;
        $this->repeatedPassword = $repeatedPassword;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     * @ValidationRule(name="test")
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getRepeatedPassword(): string
    {
        return $this->repeatedPassword;
    }

    public function getData(): array
    {
        return ['email' => $this->email, 'password' => $this->password];
    }

}

