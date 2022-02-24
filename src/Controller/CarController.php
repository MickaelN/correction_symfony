<?php

namespace App\Controller;

use App\Entity\Cars;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    private Cars $car;
    
    public function __construct()
    {
        $this->car = new Cars();
        $this->car->setBrand('Ferrari');
        $this->car->setModel('488 GTB');
        $this->car->setYear(2015);
        $this->car->setEngine('V8 bi-turbo');
        $this->car->setColor('red');
    }

    /**
     * @Route("/car", name="car")
     */
    public function index(): Response
    { 
        return $this->render('car/index.html.twig', [
            'carInfo' => $this->car,
        ]);
    }
}
