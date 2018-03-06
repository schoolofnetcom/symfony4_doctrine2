<?php

namespace App\Controller;

use App\Entity\Partida;
use App\Entity\Time;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\VarDumper\VarDumper;

class PartidasController extends Controller
{
    protected $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * @Route("/partidas", name="partidas")
     */
    public function index()
    {
        $partidas = $this->em->getRepository(Partida::class)->getPartidasPorData();

        VarDumper::dump($partidas);
        exit;

        return $this->render('partidas/index.html.twig', [
            'controller_name' => 'PartidasController',
        ]);
    }

    /**
     * @param Time $time
     * @Route("/partidas/listar-por-time/{id}", name="listar_partidas")
     * @Template("partidas/listar-por-time.html.twig")
     * @return array
     */
    public function partidasPorTimes(Time $time)
    {
        $partidas = $this->em->getRepository(Partida::class)->getPartidasPorTime($time);

        return [
            'partidas' => $partidas,
            'time' => $time
        ];
    }
}
