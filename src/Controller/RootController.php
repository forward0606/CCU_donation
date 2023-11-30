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
use App\Repository\ProjectRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

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
        // example
        $donation = new Donation();
        $donation->setName('show');
        $donation->setMoney(1999);
        $donation->setPersonId('A123456789');
        $donation->setEmail('tester@ivalid.maybe');
        $donation->setPhone('0912345678');
        $donation->setPay('VISA');
        $donation->setDescription('first_test_case');
        $donation->setAddress('test');
	    $donation->setZipcode('12345');
	    $donation->settitle('Keyboard');

        // really needed
        $donation->setIdentityType('alumni');
        $donation->setAnonymous(false);
        $donation->setType('paper');
        $donation->setDate(new \DateTime());
        $donation->setStatus('not yet');


        $form = $this->createForm(DonationType::class, $donation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // tell Doctrine you want to (eventually) save the Donation (no queries yet)
            $entityManager->persist($donation);

            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();
            return $this->render('thanks.html.twig');
        }
        return $this->render('hello.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route(path: '/get_data', name: 'get_data')]
    public function getData(ProjectRepository $ProjectRepository)
    {
        $dataFromDatabase = $ProjectRepository->findAll();

        $dataArray = [];
        foreach ($dataFromDatabase as $entity) {
            if($entity->isAvailable()){
                $dataArray[] = [
                    'id' => $entity->getId(),
                    'institution' => $entity->getInstitution(),
                    'department' => $entity->getDepartment(),
                    'name' => $entity->getName(),
                ];
            }
        }

        return new JsonResponse($dataArray);
    }
}