<?php

namespace App\Application\UseCase\UserRegister;


use App\Domain\User\Exception\Registration\EmailNotUniqueException;
use App\Domain\User\Exception\Registration\InvalidEmailDomainException;
use App\Domain\User\Repository\UserRepositoryInterface;
use App\Domain\User\Service\RegisterUserService;

class RegisterHandler
{
    /** @var  RegisterUserService */
    private $registerService;

    /** @var  UserRepositoryInterface */
    private $userRepository;

    /**
     * ValidationMiddleware constructor.
     * @param RegisterUserService $registerService
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(RegisterUserService $registerService, UserRepositoryInterface $userRepository)
    {
        $this->registerService = $registerService;
        $this->userRepository = $userRepository;
    }

    /**
     * @param RegisterCommand $command
     * @throws InvalidEmailDomainException
     * @throws EmailNotUniqueException
     */
    public function handle(RegisterCommand $command): void
    {
        $user = $this->registerService->register(
            $command->getEmail(),
            $command->getPassword(),
            $command->getUsername()
        );

        $this->userRepository->add($user);

    }
}

