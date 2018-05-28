<?php

namespace App\Application\User;


use App\Application\Command;
use App\Application\CommandValidator;
use App\Application\User\Exception\ValidationException;
use League\Tactician\Middleware;

class RegisterMiddleware implements Middleware
{
    /** @var  CommandValidator */
    private $validator;

    /**
     * ValidationMiddleware constructor.
     * @param CommandValidator $validator
     */
    public function __construct(CommandValidator $validator)
    {
        $this->validator = $validator;
    }


    /**
     * @param object $command
     * @param callable $next
     * @return mixed|void
     */
    public function execute($command, callable $next)
    {
        if ($command instanceof Command) {
           $errors =  $this->validator->validate($command, null);

           if(!empty($errors)){
               throw new ValidationException('message');
           }
        }
    }

}

