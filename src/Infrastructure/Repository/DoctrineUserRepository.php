<?php

namespace App\Infrastructure\Repository;


use App\Domain\User\Entity\User;
use App\Domain\User\Exception\Registration\InvalidUserIdentityException;
use App\Domain\User\Repository\UserRepositoryInterface;
use App\Domain\User\ValueObject\Email;
use App\Domain\User\ValueObject\UserId;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineUserRepository implements UserRepositoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManger;

    public function __construct(EntityManagerInterface $entityManger)
    {
        $this->entityManger = $entityManger;
    }

    public function byId(UserId $userId) : User
    {
        return $this->entityManger->find(User::class, $userId);
    }

    public function byEmail($email) : User
    {
        return $this->entityManger->find(User::class, $email);
    }

    public function add(User $user): void
    {
        $this->entityManger->persist($user);
    }

    /**
     * @return UserId
     * @throws InvalidUserIdentityException
     */
    public function nextIdentity(): UserId
    {
        return new UserId();
    }

    /**
     * @param Email $email
     * @return bool
     */
    public function emailUnique(Email $email): bool
    {
        return empty($this->entityManger->createQueryBuilder()
            ->select('user')
            ->from(User::class, 'user')
            ->where('user.email  = :email')
            ->setParameter(':email', $email)
            ->getQuery()
            ->getResult());
    }

}
