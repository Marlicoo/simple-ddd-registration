<?php

namespace App\Application\User;


use App\Application\Command;
use Symfony\Component\Validator\Constraints as Assert;

class RegisterCommand implements Command
{
    /**
     *
     * @var string
     * @Assert\NotBlank(message="No email entered")
     * @Assert\Email(message="Invalid email address provided")
     */
    private $email;

    /**
     * @var string
     * @Assert\NotBlank(message="No password entered")
     * @Assert\Expression("this.getPassword() === this.getRepeatedPassword()",
     *     message="The entered passwords are not identical")
     */
    private $password;

    /**
     * @var string
     * @Assert\NotBlank(message="No password was repeated")
     */
    private $repeatedPassword;

    /**
     * @var string
     * @Assert\NotBlank(message="No username entered")
     */
    private $username;

    /**
     * UserRegisterCommand constructor.
     * @param string $email
     * @param string $password
     * @param string $repeatedPassword
     * @param string $username
     */
    public function __construct(string $email, string $password, string $repeatedPassword, string $username)
    {
        $this->email = $email;
        $this->password = $password;
        $this->repeatedPassword = $repeatedPassword;
        $this->username = $username;
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

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return ['email' => $this->email, 'password' => $this->password];
    }
}

