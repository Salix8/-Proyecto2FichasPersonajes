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

    public function definirModificador(int $caracteristica): int{
        $modificador = 0;
        switch ($caracteristica){
            case 1: $modificador = -5;
            break;
            case 2: 
            case 3: $modificador = -4;
            break;
            case 4:
            case 5: $modificador = -3;
            break;
            case 6:
            case 7: $modificador = -2;
            break;
            case 8:
            case 9: $modificador = -1;
            break;
            case 10:
            case 11: $modificador = +0;
            break;
            case 12:
            case 13: $modificador = +1;
            break;
            case 14:
            case 15: $modificador = +2;
            break;
            case 16:
            case 17: $modificador = +3;
            break;
            case 18:
            case 19: $modificador = +4;
            break;
            case 20:
            case 21: $modificador = +5;
            break;
            default: $modificador = null;
        }
        return $modificador;
    }

    public function definirBonoCompetencia(int $nivel): int{
        $modificador = 0;
        switch ($nivel){
            case 1:
            case 2:
            case 3:
            case 4: $modificador = 2;
                break;
            case 5:
            case 6:
            case 7:
            case 8: $modificador = 3;
                break;
            case 9:
            case 10:
            case 11:
            case 12: $modificador = 4;
                break;
            case 13:
            case 14:
            case 15:
            case 16: $modificador = 5;
                break;
            case 17:
            case 18:
            case 19:
            case 20:  $modificador = 6;
                break;
            default: $modificador = null;
        }
        return $modificador;
    }

    public function definirHitPoints(string $clase){
        $dado = 0;
        switch ($clase){
            case "Bárbaro": $dado = 12;
                break;
            case "Guerrero":
            case "Paladin":
            case "Explorador": $dado = 10;
                break;
            case "Artificiero": 
            case "Bardo": 
            case "Clérigo":
            case "Druida":
            case "Monje":
            case "Místico":
            case "Pícaro":
            case "Brujo": $dado = 8;
                break;
            case "Hechicero":
            case "Mago": $dado = 6;
                break;
            default: $dado = null;
        }
        return $dado;
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
