<?php

namespace App\Domain\User\Exception\Registration;


class EmailNotUniqueException extends \DomainException implements UserRegistrationException
{
    /**
     * @param string $email
     * @return EmailNotUniqueException
     */
    public static function forEmail(string $email): EmailNotUniqueException
    {
        return new self(sprintf('Email %s has already been used for registration', $email));
    }
}
