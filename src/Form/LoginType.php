<?php

namespace App\Form;

use App\Entity\User;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Votre mot de passe',
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Votre adresse mail :',
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Se connecter',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'attr' => [
                'class' => 'btn btn-primary'
            ]
        ]);
    }
}

// <div class="mb-3">
// <label for="exampleInputEmail1" class="form-label">Email address</label>
// <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
// <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
// </div>
// <div class="mb-3">
// <label for="exampleInputPassword1" class="form-label">Password</label>
// <input type="password" class="form-control" id="exampleInputPassword1">
// </div>
// <div class="mb-3 form-check">
// <input type="checkbox" class="form-check-input" id="exampleCheck1">
// <label class="form-check-label" for="exampleCheck1">Check me out</label>
// </div>
// <button type="submit" class="btn btn-primary">Submit</button>
