<?php

namespace App\Controller\Admin;

use App\Entity\Cars;
use App\Entity\EnergyOption;
use App\Entity\Users;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Car Dealer');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield  MenuItem::section('Voitures', 'fas fa-car');
        yield MenuItem::linkToCrud('Liste', 'fas fa-list', Cars::class);
        yield MenuItem::linkToCrud('Nouveau', 'fas fa-add', Cars::class)->setAction('new');
        
        yield  MenuItem::section('type d\'energie', 'fas fa-engine');
        yield MenuItem::linkToCrud('Liste', 'fas fa-list', EnergyOption::class);
        yield MenuItem::linkToCrud('Nouveau', 'fas fa-add', EnergyOption::class)->setAction('new');

        yield  MenuItem::section('Utilisateur', 'fas fa-user');
        yield MenuItem::linkToCrud('Liste', 'fas fa-list', Users::class);
    }
}
