<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\LoginType;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home_index")
     */
    public function index(UserRepository $userRepository): Response
    {
        $form = $this->createForm(LoginType::class);

        return $this->render('home/index.html.twig', [
            'login_form' => $form->createView()
        ]);
    }
}
