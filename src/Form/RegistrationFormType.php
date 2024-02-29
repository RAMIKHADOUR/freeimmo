<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
         ->add('nom', TextType::class,[
                'attr'=>['class'=>'form-control','minlength'=>'2','maxlength'=>'50','placeholder' => 'Nom'],
                'constraints'=>[new NotBlank(),new Assert\Length(['min'=>2,'max'=> 50])]])

            ->add('prenom', TextType::class,[
                'attr'=>['class'=>'form-control','minlength'=>'2','maxlength'=>'50','placeholder' => 'Prenom'],
                'constraints'=>[new NotBlank(),new Assert\Length(['min'=>2,'max'=> 50])]])
            ->add('telephone_portable',TextType::class,[
                    'attr'=>['class'=>'form-control','placeholder' => 'Mobile'],
                    'label_attr'=>['class'=>'form-label'],
                    'constraints'=>[new Assert\NotBlank()]])
            ->add('telephone_fixe',TextType::class,[
                'attr' => [
                'placeholder' => 'Telephone Fixe',
            ],
            ])
            ->add('entreprise',TextType::class,[
                'attr' => [
                'placeholder' => 'Entreprise',
            ],
            ])
            ->add('site_web',TextType::class,[
                'attr' => [
                'placeholder' => 'Website',
            ],
            ])
            ->add('adresse',TextType::class,[
                'attr' => [
                'placeholder' => 'Adresse',
            ],
            ])
            ->add('ville',TextType::class,[
                'attr' => [
                'placeholder' => 'Ville',
            ],
            ])
            ->add('code_postale',TextType::class,[
                'attr' => [
                'placeholder' => 'Code Postale',
            ],
            ])
            ->add('email',TextType::class,[
                'attr' => [
                'placeholder' => 'Email',
            ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options'  => ['label' => 'Mot de passe',
                'attr'=>['placeholder' => 'Mot de Passe']],
                'second_options' => ['label' => 'Confirmer le mot de passe',
                'attr'=>['placeholder' => 'Confirmer Mot de Passe']],
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
