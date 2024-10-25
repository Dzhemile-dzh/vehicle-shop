<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('brand', TextType::class)
            ->add('model', TextType::class)
            ->add('engine_capacity', NumberType::class)
            ->add('colour', TextType::class)
            ->add('door_numbers', ChoiceType::class, [
                'choices' => [
                    3 => 3,
                    4 => 4,
                    5 => 5,
                ],
            ])
            ->add('car_category', ChoiceType::class, [
                'choices' => [
                    'Sedan' => 'sedan',
                    'Hatchback' => 'hatchback',
                    'SUV' => 'suv',
                    'Coupe' => 'coupe',
                ],
            ])
            ->add('price', NumberType::class)
            ->add('quantity', NumberType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
