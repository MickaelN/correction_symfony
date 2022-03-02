<?php

namespace App\Controller;

use App\Entity\EnergyOption;
use App\Form\EnergyOptionType;
use App\Repository\EnergyOptionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/energy/option")
 */
class EnergyOptionController extends AbstractController
{
    /**
     * @Route("/", name="energy_option_index", methods={"GET"})
     */
    public function index(EnergyOptionRepository $energyOptionRepository): Response
    {
        return $this->render('energy_option/index.html.twig', [
            'energy_options' => $energyOptionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="energy_option_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $energyOption = new EnergyOption();
        $form = $this->createForm(EnergyOptionType::class, $energyOption);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($energyOption);
            $entityManager->flush();

            return $this->redirectToRoute('energy_option_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('energy_option/new.html.twig', [
            'energy_option' => $energyOption,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="energy_option_show", methods={"GET"})
     */
    public function show(EnergyOption $energyOption): Response
    {
        return $this->render('energy_option/show.html.twig', [
            'energy_option' => $energyOption,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="energy_option_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, EnergyOption $energyOption, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EnergyOptionType::class, $energyOption);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('energy_option_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('energy_option/edit.html.twig', [
            'energy_option' => $energyOption,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="energy_option_delete", methods={"POST"})
     */
    public function delete(Request $request, EnergyOption $energyOption, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$energyOption->getId(), $request->request->get('_token'))) {
            $entityManager->remove($energyOption);
            $entityManager->flush();
        }

        return $this->redirectToRoute('energy_option_index', [], Response::HTTP_SEE_OTHER);
    }
}
