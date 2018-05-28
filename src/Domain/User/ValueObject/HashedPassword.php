<?php

namespace App\Domain\User\ValueObject;


class HashedPassword implements Password
{
    /** @var string */
    private $value;

    /**
     * HashedPassword constructor.
     * @param Password $password
     */
    public function __construct(Password $password)
    {
        $this->value = password_hash($password, PASSWORD_DEFAULT);
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
