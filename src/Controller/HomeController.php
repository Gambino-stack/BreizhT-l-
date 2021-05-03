<?php

namespace App\Controller;

use App\Entity\Headers;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $headers = $entityManager->getRepository(Headers::class)->findAll();
        return $this->render('home/index.html.twig', [
            'headers'=> $headers
        ]);
    }
}
