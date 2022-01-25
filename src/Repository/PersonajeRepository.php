<?php

namespace App\Repository;

use App\Entity\Personaje;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Personaje|null find($id, $lockMode = null, $lockVersion = null)
 * @method Personaje|null findOneBy(array $criteria, array $orderBy = null)
 * @method Personaje[]    findAll()
 * @method Personaje[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonajeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Personaje::class);
    }


    public function findByName($text): array{
        $qb = $this->createQueryBuilder("c")
        ->andWhere("c.nombre LIKE :text")
        ->setParameter("text", "%" . $text . "%")
        ->getQuery();
        return $qb->execute();
    }
    
    /*
    public function findByName2($text): array {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT c FROM App\Entity\Contacto c WHERE c.nombre LIKE :text'
        )->setParameter('text', '%' . $text . '%');
        return $query->execute();        
    }
    */

    // /**
    //  * @return Personaje[] Returns an array of Personaje objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Personaje
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
