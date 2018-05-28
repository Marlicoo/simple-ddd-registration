<?php

namespace App\Domain\User\Service;


use App\Domain\User\Entity\User;
use App\Domain\User\Exception\EmailNotUniqueException;
use App\Domain\User\Exception\InvalidEmailDomainException;
use App\Domain\User\Repository\UserRepositoryInterface;
use App\Domain\User\ValueObject\Email;
use App\Domain\User\ValueObject\HashedPassword;
use App\Domain\User\ValueObject\PlainPassword;

class RegisterUserService
{
    /** @var  UserRepositoryInterface */
    private $userRepository;

    /**
     * RegisterUserService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Register a new User
     *
     * @param string $email
     * @param string $password
     * @param string $username
     *
     * @return User
     * @throws InvalidEmailDomainException
     * @throws EmailNotUniqueException
     */
    public function register(string $email, string $password, string $username): User
    {
        $emailObject = new Email($email);

        if (!$this->userRepository->emailUnique($emailObject)) {
            throw EmailNotUniqueException::forEmail($email);
        }

        return User::register($this->userRepository->nextIdentity(), $emailObject, new HashedPassword(new PlainPassword($password)), $username);
    }

}
