<?php

namespace App\Domain\User;


use App\Domain\User\Exception\InvalidUserIdentityException;
use Assert\Assertion;
use Assert\AssertionFailedException;

class Email
{
    /** @var string */
    private $value;

    /**
     *
     * @param string $value
     * @throws InvalidUserIdentityException
     */
    public function __construct($value)
    {
        try{
            Assertion::email($value);
        }catch(AssertionFailedException $e){

            throw new InvalidUserIdentityException('message');
        }

        $this->value = $value;
    }

    /**
     * Return the object as a string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }

}