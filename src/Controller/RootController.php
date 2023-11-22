<?php
// src/Controller/RootController.php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Donation;
use App\Form\Type\DonationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class RootController extends AbstractController
{
    // #[Route('/')]
    // public function number(): Response
    // {
    //     $number = random_int(0, 100);

    //     return $this->render('hello.html.twig');
    // }

    #[Route('/')]
    public function hello(EntityManagerInterface $entityManager, Request $request): Response
    {
        $donation = new Donation();
        $donation->setName('show');


        $form = $this->createForm(DonationType::class, $donation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // tell Doctrine you want to (eventually) save the Donation (no queries yet)
            $entityManager->persist($donation);

            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();
        }
        return $this->render('hello.html.twig', [
            'form' => $form,
        ]);
    }
}