<?php

namespace App\Domain\User\Exception\Registration;


class InvalidEmailDomainException extends \DomainException implements UserRegistrationException
{
    /**
     * @param string $email
     * @param string $domain
     * @return InvalidEmailDomainException
     */
    public static function forDomain(string $email, string $domain): InvalidEmailDomainException
    {
        return new self(sprintf('Provided email %s does not belong to authorized domains: %s', $email, $domain));
    }
}
