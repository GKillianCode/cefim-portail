<?php

namespace App\Controller\Admin;

use App\Entity\Filiere;
use App\Entity\Promotion;
use App\Entity\Role;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     **/
    public function index(): Response
    {
        return $this->render('Admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<img src="https://scontent-cdg2-1.xx.fbcdn.net/v/t1.6435-9/70629072_2958151994199866_2421619801207078912_n.png?_nc_cat=108&ccb=1-6&_nc_sid=09cbfe&_nc_ohc=_16qQQ7tL0EAX9avVbK&_nc_ht=scontent-cdg2-1.xx&oh=00_AT8MhIBO_a4oPks3npmIGCS6B_YLZtsnD7i0krEAgdpUDQ&oe=62A3392A">')
            ;
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('École'),
            MenuItem::linkToCrud('Filiere', 'fa fa-tags', Filiere::class),
            MenuItem::linkToCrud('Promotion', 'fa fa-file-text', Promotion::class),

            MenuItem::section('Users'),
            MenuItem::linkToCrud('User', 'fa fa-comment', User::class),
            MenuItem::linkToCrud('Role', 'fa fa-user', Role::class),
        ];

    }
}
