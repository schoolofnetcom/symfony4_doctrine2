<?php

namespace App\Repository;

use App\Entity\Organizacao;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Organizacao|null find($id, $lockMode = null, $lockVersion = null)
 * @method Organizacao|null findOneBy(array $criteria, array $orderBy = null)
 * @method Organizacao[]    findAll()
 * @method Organizacao[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrganizacaoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Organizacao::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('o')
            ->where('o.something = :value')->setParameter('value', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
