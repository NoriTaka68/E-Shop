<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Votre prénom',
                'attr' => ['placeholder' => 'Merci de saisir votre Prénom'],
                'constraints' => [new NotBlank(),  new Length([
                    'min' => 2,
                    'max' => 30
                ])]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Votre Nom ',
                'attr' => ['placeholder' => 'Merci de saisir votre Nom'],
                'constraints' => [new NotBlank(),  new Length([
                    'min' => 2,
                    'max' => 30
                ])]
            ])
            ->add(
                'email',
                EmailType::class,
                [
                    'label' => 'Votre Email',
                    'attr' => ['placeholder' => ' Merci de saisir votre Email'],
                    'constraints' => [new NotBlank(), new Length([
                        'min' => 2,
                        'max' => 30
                    ])]
                ]
            )
            ->add(
                'password',
                RepeatedType::class,
                [
                    'type' => PasswordType::class,
                    'invalid_message' => 'Le mot de passe et la confirmation doivent être identique',
                    'label' => 'Votre mot de passe',
                    'required' => true,
                    'first_options' => ['label' => 'Mot de passe', 'attr' => ['placeholder' => 'Merci de saisir votre Mot de Passe']],
                    'second_options' => ['label' => 'Confirmez votre mot de passe', 'attr' => ['placeholder' => 'Merci de Confirmer votre Mot de Passe']],
                    'constraints' => [new NotBlank()]
                ]

            )
            ->add('submit', SubmitType::class, [
                'label' => "S'inscrire"
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
