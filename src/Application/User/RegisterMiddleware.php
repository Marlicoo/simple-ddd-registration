<?php

namespace App\Application\User;


use App\Application\User\Exception\RegisterValidationException;
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
     * @throws RegisterValidationException
     */
    public function execute($command, callable $next)
    {
        if ($command instanceof RegisterCommand) {

            /** @var ConstraintViolationListInterface $errors */
            $errors = $this->validator->validate($command);

            if (\count($errors)) {
                throw new RegisterValidationException($errors);
            }
        }

        return $next($command);
    }
}
