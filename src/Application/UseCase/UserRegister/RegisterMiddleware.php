<?php

namespace App\Application\UseCase\UserRegister;


use App\Application\Exception\UserRegister\ValidationException;
use League\Tactician\Middleware;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RegisterMiddleware implements Middleware
{
    /** @var ValidatorInterface */
    private $validator;

    /**
     * ValidationMiddleware constructor.
     * @param ValidatorInterface $validator
     */
    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param object $command
     * @param callable $next
     * @return mixed
     * @throws ValidationException
     */
    public function execute($command, callable $next)
    {
        if ($command instanceof RegisterCommand) {

            /** @var ConstraintViolationListInterface $errors */
            $errors = $this->validator->validate($command);

            if (\count($errors)) {
                throw new ValidationException($errors);
            }
        }

        return $next($command);
    }
}
