<?php

namespace App\Controller\Admin;

use App\Entity\EnergyOption;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EnergyOptionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EnergyOption::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
