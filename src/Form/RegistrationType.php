<?php

namespace App\Form;

use App\Entity\User;
use Doctrine\DBAL\Types\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\EqualTo;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotEqualTo;
use Symfony\Component\Validator\Constraints\Unique;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('login', \Symfony\Component\Form\Extension\Core\Type\TextType::class,
                [
                    'label' => 'login',
                    'attr'=>['placeholder'=>'Nickname'],
                    'constraints' => [
                        new NotEqualTo('ComteDeX'),
                        new NotEqualTo('Comte De X'),
                        new NotEqualTo('Comte-De-X'),
                        new NotEqualTo('Comte_De_X'),
                        new NotBlank(),
                        new Length(['min' => 5,'max'=>255]),
                    ]
                ])
            ->add('score', HiddenType::class, ['attr'=>['value'=>0]])
            ->add('pin', \Symfony\Component\Form\Extension\Core\Type\TextType::class,
                [
                    'label' => 'pin',
                    'mapped' => false,
                    'attr'=>['placeholder'=>'Pin'],
                    'constraints' => [
                        new EqualTo(231079),
                    ]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'allow_extra_fields' => true
        ]);
    }
}
