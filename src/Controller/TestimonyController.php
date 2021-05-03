<?php

namespace App\Controller;

use App\Entity\Testimony;
use App\Form\TestimonyType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestimonyController extends AbstractController
{
    /**
     * @Route("/testimony", name="testimony")
     */
    public function index(EntityManagerInterface $entityManager,Request $request): Response
    {
        $testimony = new Testimony();
        $form = $this->createForm(TestimonyType::class, $testimony);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($testimony);
            $entityManager->flush();
        }

        $testimonies = $entityManager->getRepository(Testimony::class)->findAll();
        return $this->render('testimony/index.html.twig', [
            'testimonies' => $testimonies,
            'form' => $form->createView()
        ]);
    }
}
