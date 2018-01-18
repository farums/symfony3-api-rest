<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Login;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;

/**
 * UsersRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LoginRepository extends EntityRepository implements UserLoaderInterface
{
    /**
     * salvar login no banco
     *
     * @param Login $login
     * @return Login
     */
    public function save(Login $login)
    {
        $this->getEntityManager()->persist($login);
        $this->getEntityManager()->flush();

        return $login;
    }

    public function loadUserByUsername($username)
    {
        return $this->createQueryBuilder('l')
            ->where('l.username = :username')
            ->setParameter('username', $username)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
