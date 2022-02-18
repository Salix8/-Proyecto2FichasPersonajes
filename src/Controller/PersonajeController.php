<?php

namespace App\Controller;

use App\Entity\Rasgo;
use App\Entity\Personaje;
use App\Entity\TipoAccion;
use App\Entity\User;
use App\Form\PersonajeType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



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
     * @Route("/personaje/nuevo", name="nuevo_personaje")
     */
    public function nuevo(ManagerRegistry $doctrine, Request $request): Response {

        if ($this->denyAccessUnlessGranted('ROLE_USER') === false) {
            return $this->redirectToRoute('login');
        }else {
            
            $personaje = new Personaje();

            $formulario = $this->createForm(PersonajeType::class, $personaje);
            
            
            $formulario->handleRequest($request);
            
            if ($formulario->isSubmitted() && $formulario->isValid()) {
                $rasgos = json_decode($formulario->get('rasgo')->getData(), false);
                $personaje = $formulario->getData();
                $entityManager = $doctrine->getManager();
                $personaje->setUser($this->getUser());
                $entityManager->persist($personaje);
                $entityManager->flush();
                $this->rasgos($rasgos, $doctrine, $personaje);

                return $this->redirectToRoute('ficha_personaje', ['codigo' => $personaje->getId()]);
            }
            
            return $this->render("nuevo.html.twig", array('formulario' => $formulario->createView()));
        }
    }

    /**
     * @Route("/personaje/editar/(codigo)", name="editar_personaje", requirements={"codigo"="\d+"})
     */
    public function editar(ManagerRegistry $doctrine, Request $request, $codigo): Response {

        $repositorio = $doctrine->getRepository(Personaje::class);
        $personaje = $repositorio->find($codigo);

        if ($personaje) {
            $formulario = $this->createForm(PersonajeType::class, $personaje);
            $formulario->handleRequest($request);
            
            if ($formulario->isSubmitted() && $formulario->isValid()) { 
                $personaje = $formulario->getData();
                $entityManager = $doctrine->getManager();
                $entityManager->persist($personaje);
                $entityManager->flush();
                return $this->redirectToRoute('ficha_personaje', ['codigo' => $personaje->getId()]);
            }
            return $this->render('nuevo.html.twig', array('formulario' => $formulario->createView()));
        }else{
            return $this->render('ficha_personaje.html.twig', ['personaje' => NULL ]);
        }
    }

    /**
     * @Route("/personaje/nuevo/rasgo/{json}", name="nuevo_rasgo_personaje")
     */
    public function rasgos($json, ManagerRegistry $doctrine, $personaje){        
        $rasgo = new Rasgo();
        
        $entityManager = $doctrine->getManager();

        $repositorio = $doctrine->getRepository(TipoAccion::class);
        foreach($json as $rasgoJson){
            $accion = $repositorio->findOneBy(["tipo" => $rasgoJson->tipoAccion]);
            $rasgo->setPersonaje($personaje);
            $rasgo->setTipoaccion($accion);
            $rasgo->setNombre($rasgoJson->titulo);
            $rasgo->setDescripcion($rasgoJson->descripcion);

            $entityManager->persist($rasgo);
        }
        $entityManager->flush();
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
        $entityManager = $doctrine->getManager();
        $repositorio = $doctrine->getRepository(Personaje::class);

        $personaje = $repositorio->find($codigo);
        
        $modFuerza = $repositorio->definirModificador($personaje->getFuerza(['fuerza']));
        $modDestreza = $repositorio->definirModificador($personaje->getDestreza(['destreza']));
        $modConstitucion = $repositorio->definirModificador($personaje->getConstitucion(['constitucion']));
        $modInteligencia = $repositorio->definirModificador($personaje->getInteligencia(['inteligencia']));
        $modSabiduria = $repositorio->definirModificador($personaje->getSabiduria(['sabiduria']));
        $modCarisma = $repositorio->definirModificador($personaje->getCarisma(['carisma']));
        
        $modCompetencia = $repositorio->definirBonoCompetencia($personaje->getNivel(['nivel']));
        $hitPoints = $repositorio->definirHitPoints($personaje->getClase(['clase']));


        return $this->render("personaje/ficha-personaje.html.twig", [
        "personaje" => $personaje, "codigo" => $codigo, 
        "modFuerza" => $modFuerza, "modDestreza" => $modDestreza,
        "modConstitucion" => $modConstitucion, "modInteligencia" => $modInteligencia,
        "modSabiduria" => $modSabiduria, "modCarisma" => $modCarisma,
        "modCompetencia" => $modCompetencia, "hitPoints" => $hitPoints,
        ]);
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
                return new Response("Personaje eliminado");
            } catch (\Exception $e ) {
                return new Response("Error al eliminar el personaje");
            }
        }else {
            return $this->render("personaje.html.twig", [
                "personaje" => null
            ]);
        }
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
                return $this->render("personaje.html.twig", [
                    "personaje" => $personaje
                ]);
            } catch (\Exception $e ) {
                return new Response("Error al insertar los datos del personaje");
            }
        }else {
            return $this->render("personaje.html.twig", [
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
    
        return $this->render("personaje.html.twig", [
            "personaje" => $personaje, "codigo" => $codigo
        ]);
    }
}
