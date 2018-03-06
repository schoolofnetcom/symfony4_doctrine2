<?php

namespace App\Repository;

use App\Entity\Campeonato;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Campeonato|null find($id, $lockMode = null, $lockVersion = null)
 * @method Campeonato|null findOneBy(array $criteria, array $orderBy = null)
 * @method Campeonato[]    findAll()
 * @method Campeonato[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CampeonatoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Campeonato::class);
    }

    public function getAllCampeonatos()
    {
        return $this->createQueryBuilder("c")
            ->innerJoin("c.organizacao", "o")
            ->getQuery()->getResult();
    }

    public function getClassificacao(Campeonato $campeonato)
    {
        $sql = "SELECT 
                    t.id AS time_id,
                    t.nome AS time_nome,
                    t.brasao AS time_brasao,
                    p.id AS partida_id,
                    p.descricao,
                    p.time_casa_id,
                    p.time_visitante_id,
                    p.placar_casa,
                    p.placar_visitante,
                    c.nome AS campeonato,
                    CASE t.id
                        WHEN p.time_casa_id THEN SUM(p.placar_casa)
                        WHEN p.time_visitante_id THEN SUM(p.placar_visitante)
                    END AS gols_sofridos,
                    CASE t.id
                        WHEN p.time_casa_id THEN SUM(p.placar_visitante)
                        WHEN p.time_visitante_id THEN SUM(p.placar_casa)
                    END AS gols_pro,
                    (CASE t.id
                        WHEN p.time_casa_id THEN SUM(p.placar_visitante)
                        WHEN p.time_visitante_id THEN SUM(p.placar_casa)
                    END - CASE t.id
                        WHEN p.time_casa_id THEN SUM(p.placar_casa)
                        WHEN p.time_visitante_id THEN SUM(p.placar_visitante)
                    END) AS gols_saldo,
                    CASE
                        WHEN
                            t.id = p.time_casa_id
                        THEN
                            CASE
                                WHEN p.placar_casa > p.placar_visitante THEN SUM(3)
                                WHEN p.placar_casa < p.placar_visitante THEN SUM(0)
                                ELSE SUM(1)
                            END
                        WHEN
                            t.id = p.time_visitante_id
                        THEN
                            CASE
                                WHEN p.placar_visitante > p.placar_casa THEN SUM(3)
                                WHEN p.placar_visitante < p.placar_casa THEN SUM(0)
                                ELSE SUM(1)
                            END
                    END AS pontos
                FROM
                    time t
                        INNER JOIN
                    partida p ON t.id = p.time_casa_id
                        OR t.id = p.time_visitante_id
                        INNER JOIN
                    campeonato c ON p.campeonato_id = c.id
                WHERE
                    c.id = :campeonato
                GROUP BY t.nome
                order by pontos desc, gols_saldo desc, gols_pro desc";

        return $this->getEntityManager()
            ->getConnection()
            ->executeQuery($sql, [':campeonato' => $campeonato->getId()])
            ->fetchAll(\PDO::FETCH_OBJ);
    }
}
