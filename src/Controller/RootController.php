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
use Symfony\Component\Form\FormInterface;


class RootController extends AbstractController
{
    // #[Route('/')]
    // public function number(): Response
    // {
    //     $number = random_int(0, 100);

    //     return $this->render('hello.html.twig');
    // }
    
    private function getErrorsFromForm(FormInterface $form): array
    {
        $errors = array();
    
        foreach ($form->getErrors(true, true) as $error) {
            $errors[] = $error->getMessage();
        }
    
        foreach ($form->all() as $child) {
            if (!$child->isValid()) {
                $errors[$child->getName()] = $this->getErrorsFromForm($child);
            }
        }
    
        return $errors;
    }
    

    #[Route('/')]
    public function hello(EntityManagerInterface $entityManager, Request $request): Response
    {
        $donation = new Donation();
        // example
        // $donation->setName('show');
        // $donation->setMoney(1999);
        // $donation->setPersonId('A123456789');
        // $donation->setEmail('test@test.com');
        // $donation->setPhone('0912345678');
        // $donation->setPay('VISA');
        // $donation->setDescription('first_test_case');
        // $donation->setAddress('test');
	    // $donation->setZipcode('12345');
	    //$donation->settitle('Keyboard');

        // really needed
        $donation->setIdentityType('alumni');
        $donation->setAnonymous(false);
        $donation->setType('paper');
        $donation->setDate(new \DateTime());
        $donation->setStatus('not yet');


        $form = $this->createForm(DonationType::class, $donation);
        $form->handleRequest($request);
        $submitted = false;
        if ($form->isSubmitted() && $form->isValid()) {
            // tell Doctrine you want to (eventually) save the Donation (no queries yet)
            $entityManager->persist($donation);

            if($donation->getMoney() >= 150){
                // actually executes the queries (i.e. the INSERT query)
                $entityManager->flush();
                return $this->render('thanks.html.twig');
            }
            $submitted = true;

        }else if($form->isSubmitted()){
            // Handle form validation errors
            $errors = $this->getErrorsFromForm($form);
            $submitted = true;
        }
        return $this->render('hello.html.twig', [
            'form' => $form,
            'submit_error' => $submitted,
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