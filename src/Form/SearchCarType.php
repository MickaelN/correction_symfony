<?php

namespace App\Form;

use App\Entity\CarsSearch;
use App\Entity\EnergyOption;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchCarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('energyOption', EntityType::class,[
                'class' => EnergyOption::class,
                'choice_label' => 'name'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CarsSearch::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'TOTOTOTOTOTOTO';
    }
}
