<?php

namespace App\Form;

use App\Entity\Cars;
use App\Entity\EnergyOption;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EnergyOptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom : ',
                'attr'  => [
                    'class' => 'mb-4',
                    'placeholder' => 'Electrique'
                ],
                'row_attr' => [
                    'class' => 'form-floating'
                ]
            ])
            ->add('car', null, [
                'label' => false,
                'attr'  => [
                    'class' => 'mb-4',
                    // 'height' => '15' 
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EnergyOption::class,
        ]);
    }
}
