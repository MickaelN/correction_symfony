<?php

namespace App\Controller;

use App\Entity\Cars;
use App\Entity\CarsSearch;
use App\Entity\Seats;
use App\Form\SearchCarType;
use App\Repository\CarsRepository;
use App\Repository\SeatsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarController extends AbstractController
{
    /**
     * @Route("/", name="car")
     */
    public function index(Request $request, CarsRepository $carsRepository): Response
    {
        $cars = $carsRepository->findAll();
        $carSearch = new CarsSearch;
        $form = $this->createForm(SearchCarType::class, $carSearch);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $search_car = $request->request->get('search_car');
            $cars = $carsRepository->findBySearch($search_car['energyOption']);
        }
        return $this->render('car/index.html.twig', [
            'carList' => $cars,
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/car/info/{id}/{slug}", name="carInfo", requirements={"slug": "[a-z0-9\-]+"})
     */
    public function show(?Cars $cars, string $slug): Response
    {
        //On vérifie que la voiture a été trouvé et que le slug correspond. Si ce n'est pas la cas on redirige vers la liste des voitures
        if (is_null($cars) || $cars->getSlug() != $slug) {
            return $this->redirectToRoute('car', [], 301);
        }
        return $this->render('car/info.html.twig', [
            'carInfo' => $cars,
        ]);
    }
}
