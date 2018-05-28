<?php

namespace App\Domain\User\ValueObject;


use App\Domain\User\Exception\InvalidUserIdentityException;
use Assert\Assertion;
use Assert\AssertionFailedException;
use Ramsey\Uuid\Uuid;

class UserId
{
    /**
     * @var string
     */
    private $id;

    /**
     * @param string $id
     * @throws InvalidUserIdentityException
     */
    public function __construct($id = null)
    {
        $id = $id ?? Uuid::uuid4()->toString();

        try{
            Assertion::uuid($id);
        }catch(AssertionFailedException $e){

            throw InvalidUserIdentityException::forId($id);
        }

        $this->id = $id;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }

    /**
     * @param UserId $userId
     *
     * @return bool
     */
    public function equals(UserId $userId): bool
    {
        return $this->id() === $userId->id();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->id();
    }
}
