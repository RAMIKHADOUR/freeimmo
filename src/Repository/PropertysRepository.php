<?php

namespace App\Repository;

use App\Entity\Propertys;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Propertys>
 *
 * @method Propertys|null find($id, $lockMode = null, $lockVersion = null)
 * @method Propertys|null findOneBy(array $criteria, array $orderBy = null)
 * @method Propertys[]    findAll()
 * @method Propertys[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertysRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Propertys::class);
    }

  /**
     * Recherche les annonces en fonction du formulaire
     * @return void
     */
    public function search($mots){
        $query = $this->createQueryBuilder('p');
        if($mots != null){
            $query->andWhere('MATCH_AGAINST(p.ville, p.region) AGAINST (:mots boolean)>0')
                ->setParameter('mots', $mots);
        }
       
        return $query->getQuery()->getResult();
    }

//    /**
//     * @return Propertys[] Returns an array of Propertys objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Propertys
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }



}
