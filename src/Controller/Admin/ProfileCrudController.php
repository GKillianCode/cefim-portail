<?php

namespace App\Controller\Admin;

use App\Admin\Field\PasswordField;
use App\Admin\Field\RoleField;
use App\Entity\Profile;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProfileCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Profile::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('last_name'),
            TextField::new('first_name'),
            RoleField::new('roles'),
            EmailField::new('email'),
            PasswordField::new('password'),
        ];
    }

}
