<?php

namespace App\Controller;

use App\Entity\Cars;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarController extends AbstractController
{
    /**
     * @Route("/car", name="car")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $cars = $doctrine->getRepository(Cars::class)->findAll();
        return $this->render('car/index.html.twig', [
            'carList' => $cars,
            
        ]);
    }
    /**
     * @Route("/car/info/{id}/{slug}", name="carInfo", requirements={"slug": "[a-z0-9\-]+"})
     */
    public function show(?Cars $cars, string $slug): Response
    {
        //On vérifie que la voiture a été trouvé et que le slug correspond. Si ce n'est pas la cas on redirige vers la liste des voitures
        if (is_null($cars) || $cars->getSlug() != $slug) {
            return $this->redirectToRoute('car',[], 301);
        }
        return $this->render('car/info.html.twig', [
            'carInfo' => $cars,
        ]);
    }
}
