<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PartidaRepository")
 */
class Partida
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $descricao;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $placar_visitante;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $placar_casa;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $data_partida;

    /**
     * @var Campeonato
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Campeonato")
     */
    private $campeonato;

    /**
     * @var Time
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Time", inversedBy="partidas_casa")
     */
    private $time_casa;

    /**
     * @var Time
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Time", inversedBy="partidas_visitante")
     */
    private $time_visitante;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     * @return Partida
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * @return int
     */
    public function getPlacarVisitante()
    {
        return $this->placar_visitante;
    }

    /**
     * @param int $placar_visitante
     * @return Partida
     */
    public function setPlacarVisitante($placar_visitante)
    {
        $this->placar_visitante = $placar_visitante;
        return $this;
    }

    /**
     * @return int
     */
    public function getPlacarCasa()
    {
        return $this->placar_casa;
    }

    /**
     * @param int $placar_casa
     * @return Partida
     */
    public function setPlacarCasa($placar_casa)
    {
        $this->placar_casa = $placar_casa;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataPartida()
    {
        return $this->data_partida;
    }

    /**
     * @param \DateTime $data_partida
     * @return Partida
     */
    public function setDataPartida($data_partida)
    {
        $this->data_partida = $data_partida;
        return $this;
    }

    /**
     * @return Campeonato
     */
    public function getCampeonato()
    {
        return $this->campeonato;
    }

    /**
     * @param Campeonato $campeonato
     * @return Partida
     */
    public function setCampeonato($campeonato)
    {
        $this->campeonato = $campeonato;
        return $this;
    }

    /**
     * @return Time
     */
    public function getTimeCasa()
    {
        return $this->time_casa;
    }

    /**
     * @param Time $time_casa
     * @return Partida
     */
    public function setTimeCasa($time_casa)
    {
        $this->time_casa = $time_casa;
        return $this;
    }

    /**
     * @return Time
     */
    public function getTimeVisitante()
    {
        return $this->time_visitante;
    }

    /**
     * @param Time $time_visitante
     * @return Partida
     */
    public function setTimeVisitante($time_visitante)
    {
        $this->time_visitante = $time_visitante;
        return $this;
    }




}
