<?php

namespace App\Domain\User\ValueObject;


class PlainPassword implements Password
{

    /** @var string */
    private $value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
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
