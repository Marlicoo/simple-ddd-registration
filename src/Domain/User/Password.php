<?php

namespace App\Domain\User;


use App\Domain\User\Exception\InvalidPasswordLengthException;
use App\Domain\User\Exception\InvalidRepeatedPasswordException;

class Password
{
    public const MIN_LENGTH = 8;

    /** @var string */
    private $value;

    /**
     *
     * @param string $value
     * @param string $repeatedValue
     * @throws InvalidPasswordLengthException
     * @throws InvalidRepeatedPasswordException
     */
    public function __construct(string $value, string $repeatedValue)
    {

        if($value !== $repeatedValue){
            throw new InvalidRepeatedPasswordException('message');
        }

        if(\strlen($value) < self::MIN_LENGTH){
            throw new InvalidPasswordLengthException('message');
        }

        $this->value = $value;
    }

    /**
     * Return the object as a string
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}