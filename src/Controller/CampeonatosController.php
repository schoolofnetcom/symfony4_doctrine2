<?php

namespace App\Controller;

use App\Entity\Campeonato;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CampeonatosController extends Controller
{
    protected $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }


    /**
     * @Route("/campeonatos", name="campeonatos")
     * @Template("campeonatos/index.html.twig")
     */
    public function index()
    {
        $campeonatos = $this->em->getRepository(Campeonato::class)->getAllCampeonatos();

        return [
            'campeonatos' => $campeonatos
        ];
    }

    /**
     * @Route("/campeonato/classificacao/{id}", name="classificacao")
     * @Template("campeonatos/classificacao.html.twig")
     */
    public function classificacao(Campeonato $campeonato)
    {
        $classificacao = $this->em->getRepository(Campeonato::class)->getClassificacao($campeonato);

        return [
            'classificacao' => $classificacao,
            'campeonato' => $campeonato
        ];
    }
}
