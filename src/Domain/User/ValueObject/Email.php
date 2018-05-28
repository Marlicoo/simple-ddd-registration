<?php

namespace App\Domain\User\ValueObject;


use App\Domain\User\Exception\Registration\InvalidEmailDomainException;

class Email
{
    public static $domains = ['noname.pl', 'bartech.com'];

    /** @var string */
    private $value;

    /**
     *
     * @param string $value
     * @throws InvalidEmailDomainException
     */
    public function __construct($value)
    {
        $domain = substr($value, strrpos($value, '@') + 1);

        if(!\in_array($domain, self::$domains, true)){

            throw InvalidEmailDomainException::forDomain($value, implode(self::$domains, ', '));
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
