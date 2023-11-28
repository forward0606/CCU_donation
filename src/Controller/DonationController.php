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
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;

#[Route(path: '/donation')]
class DonationController extends AbstractController
{
    #[Route(path: '', name: 'donation_all')]
    public function showAction(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Donation::class);

	$donations = $repository->findBy([], ['id' => 'ASC']);
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

    #[Route(path: '/filter', name: 'donation_filter')]
    public function filterAction(EntityManagerInterface $entityManager, Request $request) :Response //
    {
	$donation = new Donation();
	$form = $this->createForm(DonationType::class, $donation, ['filter' => true]);
	$form->submit($request->get($form->getName()));

	if ($form->isSubmitted() && $form->isValid())
	{
            //$donation = $form->getData();
	    $reflectionExtractor = new ReflectionExtractor();
	    $propertyInfo = new PropertyInfoExtractor([$reflectionExtractor]);
	    $properties = $propertyInfo->getProperties(Donation::class); //return an array of properties name

	    $qb = $entityManager->createQueryBuilder()->select('d');
	    $qb->from('App\Entity\Donation', 'd');


	    if ($form->get('andOperator')->getData()) {
   	        foreach($properties as $property) {
	            switch($property)
		    {
	                //reason for switch case is that symfony seems to ignore _ between characters and just change the character after _ to capital.
		        case 'personId':
			    $data = $form->get('person_id')->getData();
			    if ($data === null) {;}
			    else $qb->andWhere('d.person_id = \'' . $data . '\'');
			    break;
		        case 'identityType':
                            $data = $form->get('identity_type')->getData();
                            if ($data === null) {;}
			    else $qb->andWhere('d.identity_type = \'' . $data . '\'');
			    break;
		        case 'date':
                            $date = $form->get('date')->getData();
                            if ($date === null) {;}
			    else {$qb->andWhere('d.date = \''.$date->format('Y-m-d').'\'');}
		            break;
		        case 'payDate':
                            $pay_date = $form->get('pay_date')->getData();
                            if ($pay_date === null) {;}
                            else {$qb->andWhere('d.pay_date = \''.$pay_date->format('Y-m-d').'\'');}
                            break;
		        case 'projectName':
			    $data = $form->get('project_name')->getData();
                            if ($data === null) {;}
			    else $qb->andWhere('d.project_name = ' . $data);
			    break;
		        //break directly since there is no such field in form
		        case 'id':
			    break;
		        case 'description':
			    break;
		        default: // those who don't has _ in their name.
			    $data = $form->get($property)->getData();
                            if ($data === null) {;}
			    else $qb->andWhere('d.' . $property . ' = \'' . $data. '\'');
			    break;
		    }
		}
	    }
	    else {
                foreach($properties as $property) {
                    switch($property)
                    {
                        case 'personId':
                            $data = $form->get('person_id')->getData();
                            if ($data === null) {;}
                            else $qb->orWhere('d.person_id = \'' . $data. '\'');
                            break;
                        case 'identityType':
                            $data = $form->get('identity_type')->getData();
                            if ($data === null) {;}
                            else $qb->orWhere('d.identity_type = \'' . $data. '\'');
                            break;
                        case 'date':
                            $date = $form->get('date')->getData();
                            if ($date === null) {;}
                            else {$qb->orWhere('d.date = \''.$date->format('Y-m-d').'\'');}
                            break;
                        case 'payDate':
                            $pay_date = $form->get('pay_date')->getData();
                            if ($pay_date === null) {;}
                            else {$qb->orWhere('d.pay_date = \''.$pay_date->format('Y-m-d').'\'');}
                            break;
                        case 'projectName':
                            $data = $form->get('project_name')->getData();
                            if ($data === null) {;}
                            else $qb->orWhere('d.project_name = ' . $data);
                            break;
                        //break directly since there is no such field in form
                        case 'id':
                            break;
                        case 'description':
                            break;
                        default: // those who don't has _ in their name.
                            $data = $form->get($property)->getData();
                            if ($data === null) {;}
                            else $qb->orWhere('d.' . $property . ' = \'' . $data.'\'');
                            break;
                    }
		}
	    }
	    $matches = $qb->getQuery()->getResult(); //get query result as array of donation object
	    return $this->render('donation/filter.html.twig', [
		'donations' => $matches,
		//'sql' => $qb->getQuery()->getDQL(),
	    ]);
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

    #[Route(path: '/status/{did}', name: 'donation_status')]
    public function statusAction(EntityManagerInterface $entityManager, int $did): Response
    {
	$donation = $entityManager->getRepository(Donation::class)->find($did);
	$status = $donation->getStatus();
	$type = $donation->getType();
	if ($type != 'none'){
	    if ($status == 'not yet') {
	        $donation->setStatus('delivered');
            }
            else if ($status == 'delivered') {
	        $donation->setStatus('not yet');
	    }
	    else if ($status == 'none') {
                // no change
            }
	    else {
	        throw exception('invalid value in status');
	    }
	    $entityManager->flush();
	}
	$donations = $entityManager->getRepository(Donation::class)->findAll();
	return $this->redirectToRoute('donation_all', [
	    'donations' => $donations,
	]);
    }

    #[Route(path: '/sort/{fields}/{orderBy}', name: 'donation_sort')]
    public function sortAction(DonationRepository $donationRepository, string $fields, string $orderBy=null): Response
    {// simply accept correct strings that are not validated and generate sorted data
	$fieldList = explode(',', $fields);
	$orderByList = explode(',', $orderBy);
	$sort = $donationRepository->orderBy($fieldList, $orderByList);
	return $this->render('donation/all.html.twig', [
		'donations' => $sort
	]);
    }
    
}
