<?php

namespace App\Controller\Admin;

use App\Entity\Filiere;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FiliereCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Filiere::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('nom'),

        ];
    }

}
