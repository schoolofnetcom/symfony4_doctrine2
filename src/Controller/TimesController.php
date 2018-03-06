<?php

namespace App\Controller;

use App\Entity\Time;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TimesController extends Controller
{
    protected $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * @Route("/times", name="times")
     * @Template("times/index.html.twig")
     */
    public function index()
    {
        $times = $this->em->getRepository(Time::class)->findAll();
        return [
            'times' => $times
        ];
    }
}
