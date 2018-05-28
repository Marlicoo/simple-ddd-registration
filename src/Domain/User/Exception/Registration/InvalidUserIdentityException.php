<?php

namespace App\Domain\User\Exception\Registration;


class InvalidUserIdentityException extends \DomainException implements UserRegistrationException
{
    public static function forId(string $id)
    {
        return new self(sprintf('Invalid user id %s has been passed', $id));
    }
}