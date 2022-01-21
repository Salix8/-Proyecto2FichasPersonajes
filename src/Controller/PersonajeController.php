<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Personaje;
use Doctrine\Persistence\ManagerRegistry;

class PersonajeController extends AbstractController
{

    private $personajes = [
        1 => ["nombre" => "Galathar", "raza" => "Eladrin", "clase" => "Mistica", "nivel" => "10", 
              "fuerza" => "11", "destreza" => "14", "constitucion" => "18", "inteligencia" => "18", "sabiduria" => "14", "carisma" => "15",
              "descripcion" => "Prioriza la libertad ante todo", "equipamiento" => "Nada", "autor" => "Admin"],

        2 => ["nombre" => "Asmund", "raza" => "Gith", "clase" => "Guerrero", "nivel" => "10", 
              "fuerza" => "12", "destreza" => "18", "constitucion" => "20", "inteligencia" => "14", "sabiduria" => "10", "carisma" => "13",
              "descripcion" => "Prioriza la protección de sus amigos ante todo", "equipamiento" => "Nada", "autor" => "Admin"],

        3 => ["nombre" => "Phil", "raza" => "Draconido", "clase" => "Monje", "nivel" => "10", 
              "fuerza" => "11", "destreza" => "18", "constitucion" => "14", "inteligencia" => "11", "sabiduria" => "16", "carisma" => "13",
              "descripcion" => "Es dado a beber mas de la cuenta", "equipamiento" => "Nada", "autor" => "Admin"],

        4 => ["nombre" => "Bella", "raza" => "Mediana", "clase" => "Barda", "nivel" => "10", 
              "fuerza" => "8", "destreza" => "10", "constitucion" => "13", "inteligencia" => "11", "sabiduria" => "9", "carisma" => "18",
              "descripcion" => "Le encanta cantar y mas si es con una buena copa", "equipamiento" => "Nada", "autor" => "Admin"],
    ];     

    private function definirModificador(int $caracteristica): int{
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

    /**
     * @Route("/personaje/insertar", name="insertar_personaje")
     */
    public function insertar(ManagerRegistry $doctrine) {
        $entityManager = $doctrine->getManager();
        foreach ($this->personajes as $pj) {
            $personaje = new Personaje();
            $personaje->setNombre($pj["nombre"]);
            $personaje->setRaza($pj["raza"]);
            $personaje->setClase($pj["clase"]);
            $personaje->setNivel($pj["nivel"]);
            $personaje->setFuerza($pj["fuerza"]);
            $personaje->setDestreza($pj["destreza"]);
            $personaje->setConstitucion($pj["constitucion"]);
            $personaje->setInteligencia($pj["inteligencia"]);
            $personaje->setSabiduria($pj["sabiduria"]);
            $personaje->setCarisma($pj["carisma"]);
            $personaje->setDescripcion($pj["descripcion"]);
            $personaje->setEquipamiento($pj["equipamiento"]);
            $entityManager->persist($personaje);
        }
        
        try {
            $entityManager->flush();
            return new Response("Personajes insertados correctamente");
        } catch (\Exception $e) {
            return new Response("Error insertando los personajes");
        }
    }

    /**
     * @Route("/personaje/buscar/{texto}", name="ficha_personaje")
     */
    public function buscar($texto): Response {
        $resultados = array_filter($this->personajes,
            function ($personaje) use ($texto){
                return strpos($personaje["nombre"], $texto) !== false;
            }
        );

        return $this->render("ficha_personaje.html.twig",[
            "personaje" => $resultados
        ]);
    }

    /**
     * @Route("/personaje/ficha/{codigo<\d+>?1}", name="personaje_ficha")
     */
    public function ficha($codigo): Response {
    
        $resultado = ($this->personajes[$codigo] ?? null);
        
        return $this->render("personaje/personaje.html.twig", [
        "personaje" => $resultado, "codigo" => $codigo
        ]);
    }

    /**
     * @Route("/personaje/{codigo<\d+>?1}", name="ficha_predeterminada_personaje")
     */
    public function fichaPredeterminada($codigo): Response {
    
      $resultado = ($this->personajes[$codigo] ?? null);
    
      return $this->render("ficha_personaje.html.twig", [
      "personaje" => $resultado, "codigo" => $codigo
      ]);
    }
}
