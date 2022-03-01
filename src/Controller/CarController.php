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
     * @Route("/car/info", name="carInfo")
     */
    public function info(): Response
    {
        return $this->render('car/info.html.twig', [
            'carInfo' => $this->car,
        ]);
    }
}
