<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    /**
     * @Route("/car", name="car")
     */
    public function index(): Response
    {
        $carInfo = [
            'brand' => 'Ferrari',
            'model' => '488 GTB',
            'year' => '2015',
            'engine' => 'V8 bi-turbo',
            'color' => 'red'
        ];
        return $this->render('car/index.html.twig', [
            'carInfo' => $carInfo,
        ]);
    }
}
