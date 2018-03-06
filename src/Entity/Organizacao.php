<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrganizacaoRepository")
 */
class Organizacao
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
     * @ORM\Column(type="string")
     */
    private $nome;

    /**
     * @var Campeonato
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Campeonato", mappedBy="organizacao")
     */
    private $campeonatos;

    /**
     * @var Organizacao
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Organizacao", inversedBy="filhos")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $pai;

    /**
     * @var Organizacao
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Organizacao", mappedBy="pai")
     */
    private $filhos;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Organizacao
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return Organizacao
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return Campeonato
     */
    public function getCampeonatos()
    {
        return $this->campeonatos;
    }

    /**
     * @param Campeonato $campeonatos
     * @return Organizacao
     */
    public function setCampeonatos($campeonatos)
    {
        $this->campeonatos = $campeonatos;
        return $this;
    }

    /**
     * @return Organizacao
     */
    public function getPai()
    {
        return $this->pai;
    }

    /**
     * @param Organizacao $pai
     * @return Organizacao
     */
    public function setPai($pai)
    {
        $this->pai = $pai;
        return $this;
    }

    /**
     * @return Organizacao
     */
    public function getFilhos()
    {
        return $this->filhos;
    }

    /**
     * @param Organizacao $filhos
     * @return Organizacao
     */
    public function setFilhos($filhos)
    {
        $this->filhos = $filhos;
        return $this;
    }



}
