<?php
// src/Controller/DonationController.php
namespace App\Controller;

// ...
use App\Entity\Donation;
use App\Form\Type\DonationType;
use App\Repository\DonationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/donation')]
class DonationController extends AbstractController
{
    #[Route(path: '', name: 'donation_all')]
    public function showAction(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Donation::class);

        $donations = $repository->findAll();
        return $this->render('donation/all.html.twig', [
            'donations' => $donations,
        ]);
    }
    
    #[Route(path: '/add', name: 'donation_add')]
    public function createAction(EntityManagerInterface $entityManager, Request $request): Response
    {
        $donation = new Donation();
        $donation->setName('Keyboard');
        $donation->setMoney(1999);
        $donation->setPersonId('A123456789');
        $donation->setAnonymous(true);
        $donation->setIdentityType('normal');
        $donation->setEmail('tester@ivalid.maybe');
        $donation->setPhone('0912345678');
        $donation->setPay('VISA');
        $donation->setStatus('not yet');
        $donation->setType('paper');
        $donation->setDescription('first_test_case');
        $donation->setDate(new \DateTime());
        $donation->setAddress('test');
	    $donation->setZipcode('12345');
	    $donation->settitle('Keyboard');




        $form = $this->createForm(DonationType::class, $donation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // tell Doctrine you want to (eventually) save the Donation (no queries yet)
            $entityManager->persist($donation);

            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();
            return $this->redirectToRoute('donation_all');
        }
        return $this->render('donation/add.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route(path: '/{did}', name: 'donation_show')]
    public function indexAction(DonationRepository $donationRepository, int $did): Response
    {
        $donation = $donationRepository
            ->find($did);

        return $this->render('donation/index.html.twig', [
            'donation' => $donation,
        ]);
    }

    
}
