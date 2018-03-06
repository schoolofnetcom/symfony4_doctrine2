<?php

namespace App\Repository;

use App\Entity\Partida;
use App\Entity\Time;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Partida|null find($id, $lockMode = null, $lockVersion = null)
 * @method Partida|null findOneBy(array $criteria, array $orderBy = null)
 * @method Partida[]    findAll()
 * @method Partida[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartidaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Partida::class);
    }

    public function getPartidasPorTime(Time $time)
    {
        $q = $this->createQueryBuilder("p")
            ->innerJoin("p.campeonato", "c")
            ->innerJoin("App\Entity\Time", 't', 'WITH',
                    't.id = p.time_casa OR t.id = p.time_visitante'
                )
            ->where("t.id = :id")
            ->setParameter("id", $time)
            ->getQuery();

        return $q->getResult();
    }

    public function getPartidasPorData()
    {
        $q = $this->createQueryBuilder("p");
        $q->where(
                $q->expr()->between("p.data_partida", ':data1', ':data2')
            );

        $q->setParameter('data1', '2018-01-10 00:00:00');
        $q->setParameter('data2', '2018-01-15 23:59:59');

        $q->andWhere($q->expr()->andX(
            $q->expr()->like(),
            $q->expr()->notIn()
        ));

        return $q->getQuery()->getResult();
    }
}
