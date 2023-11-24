<?php

namespace App\Repository;

use App\Entity\Donation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Donation>
 *
 * @method Donation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Donation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Donation[]    findAll()
 * @method Donation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DonationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Donation::class);
    }

    public function displaySpecificFields(array $fields)
    {
	$entityManager = $this->getEntityManager();
	$qb = $entityManager->createQueryBuilder('d');

	foreach ($fields as $field) {
	    $qb->addSelect('d.'.trim($field));
	}
	$qb->from('App\Entity\Donation', 'd');
	return $qb->getQuery()->getResult();
    }
    public function orderBy(array $fieldList, array $orderByList){
        if (count($fieldList) == count($orderByList)) $length = count($fieldList);
	$em = $this->getEntityManager();
	$qb = $em->createQueryBuilder();
	$qb->select('d');
        $qb->from('App\Entity\Donation', 'd');
        for($i=0 ; $i<$length ; ++$i) {
            $qb->addorderBy('d.'.$fieldList[$i], $orderByList[$i]);
        }
        return  $qb->getQuery()->getResult();
    }

//    /**
//     * @return Donation[] Returns an array of Donation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Donation
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
