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
        1 => ["nombre" => "Galathar", "raza" => "Eladrin", "clase" => "Mistico", "nivel" => "10", 
              "fuerza" => "11", "destreza" => "14", "constitucion" => "18", "inteligencia" => "18", "sabiduria" => "14", "carisma" => "15",
              "descripcion" => "Prioriza la libertad ante todo", "equipamiento" => "Nada", "autor" => "Admin"],

        2 => ["nombre" => "Asmund", "raza" => "Gith", "clase" => "Guerrero", "nivel" => "10", 
              "fuerza" => "12", "destreza" => "18", "constitucion" => "20", "inteligencia" => "14", "sabiduria" => "10", "carisma" => "13",
              "descripcion" => "Prioriza la protección de sus amigos ante todo", "equipamiento" => "Nada", "autor" => "Admin"],

        3 => ["nombre" => "Phil", "raza" => "Draconido", "clase" => "Monje", "nivel" => "10", 
              "fuerza" => "11", "destreza" => "18", "constitucion" => "14", "inteligencia" => "11", "sabiduria" => "16", "carisma" => "13",
              "descripcion" => "Es dado a beber mas de la cuenta", "equipamiento" => "Nada", "autor" => "Admin"],

        4 => ["nombre" => "Bella", "raza" => "Mediana", "clase" => "Bardo", "nivel" => "10", 
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

    private function definirBonoCompetencia(int $nivel): int{
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

    private function definirHitPoints(string $clase){
        $dado = 0;
        switch ($clase){
            case "Barbaro": $dado = 12;
                break;
            case "Guerrero":
            case "Paladin":
            case "Explorador": $dado = 10;
                break;
            case "Artificiero": 
            case "Bardo": 
            case "Clerigo":
            case "Druida":
            case "Monje":
            case "Mistico":
            case "Picaro":
            case "Brujo": $dado = 8;
                break;
            case "Hechicero":
            case "Mago": $dado = 6;
                break;
            default: $dado = null;
        }
        return $dado;
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
     * @Route("/personaje/lista", name="lista_personaje")
     */
    public function lista(ManagerRegistry $doctrine): Response {
        $repositorio = $doctrine->getRepository(Personaje::class);
        $personajes = $repositorio->findAll();

        return $this->render("lista_personajes.html.twig",[
            'personajes' => $personajes
        ]);
    }

    /**
     * @Route("/personaje/buscar/{texto}", name="buscar_personaje")
     */
    public function buscar(ManagerRegistry $doctrine, $texto): Response {
        $repositorio = $doctrine->getRepository(Personaje::class);
        $personajes = $repositorio->findByName($texto);

        return $this->render("lista_personajes.html.twig",[
            'personajes' => $personajes, 'texto' => $texto
        ]);
    }

    /**
     * @Route("/personaje/ficha/{codigo<\d+>?1}", name="ficha_personaje")
     */
    public function ficha(ManagerRegistry $doctrine, $codigo): Response {
    
        $repositorio = $doctrine->getRepository(Personaje::class);
        $personaje = ($this->personajes[$codigo] ?? null);

        $modFuerza = $this->definirModificador($personaje['fuerza']);
        $modDestreza = $this->definirModificador($personaje['destreza']);
        $modConstitucion = $this->definirModificador($personaje['constitucion']);
        $modInteligencia = $this->definirModificador($personaje['inteligencia']);
        $modSabiduria = $this->definirModificador($personaje['sabiduria']);
        $modCarisma = $this->definirModificador($personaje['carisma']);

        $modCompetencia = $this->definirBonoCompetencia($personaje['nivel']);
        $hitPoints = $this->definirHitPoints($personaje['clase']);

        return $this->render("personaje/personaje.html.twig", [
        "personaje" => $personaje, "codigo" => $codigo, 
        "modFuerza" => $modFuerza, "modDestreza" => $modDestreza,
        "modConstitucion" => $modConstitucion, "modInteligencia" => $modInteligencia,
        "modSabiduria" => $modSabiduria, "modCarisma" => $modCarisma,
        "modCompetencia" => $modCompetencia, "hitPoints" => $hitPoints
        ]);
    }

    /**
     * @Route("/personaje/update/{id}/{nombre}", name="modificar_personaje")
     */
    public function update(ManagerRegistry $doctrine, $id, $nombre): Response {
        $entityManager = $doctrine->getManager();
        $repositorio = $doctrine->getRepository(Personaje::class);
        $personaje = $repositorio->find($id);

        if ($personaje) {
            $personaje->setNombre($nombre);
            try {
                $entityManager->flush();
                return $this->render("ficha_personaje.html.twig", [
                    "personaje" => $personaje
                ]);
            } catch (\Exception $e ) {
                return new Response("Error al insertar los datos del personaje");
            }
        }else {
            return $this->render("ficha_personaje.html.twig", [
                "personaje" => null
            ]);
        }
    }

    /**
     * @Route("/personaje/delete/{id}", name="eliminar_personaje")
     */
    public function delete(ManagerRegistry $doctrine, $id): Response {
        $entityManager = $doctrine->getManager();
        $repositorio = $doctrine->getRepository(Personaje::class);
        $personaje = $repositorio->find($id);

        if ($personaje) {
            try {
                $entityManager->remove($personaje);
                $entityManager->flush();
                return new Response("Contacto eliminado");
            } catch (\Exception $e ) {
                return new Response("Error al eliminar el personaje");
            }
        }else {
            return $this->render("ficha_personaje.html.twig", [
                "personaje" => null
            ]);
        }
    }

    /**
     * @Route("/personaje/{codigo<\d+>?1}", name="ficha_predeterminada_personaje")
     */
    public function fichaPredeterminada(ManagerRegistry $doctrine, $codigo): Response {
        $repositorio = $doctrine->getRepository(Personaje::class);
        $personaje = $repositorio->find($codigo);
    
        return $this->render("ficha_personaje.html.twig", [
            "personaje" => $personaje, "codigo" => $codigo
        ]);
    }
}
