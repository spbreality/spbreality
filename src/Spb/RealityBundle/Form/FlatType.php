<?php

namespace Spb\RealityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class FlatType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('operation')
                
            ->add('district')
            ->add('address')
            ->add('building_stage')

            ->add('building_type')

            ->add('floor')
            ->add('floors')
                
            ->add('rooms')
            ->add('s')
            ->add('sl')
            ->add('sk')
            ->add('price')


            ->add('sdesc')
            ->add('ldesc')


        ;
    }

    public function getName()
    {
        return 'spb_realitybundle_flattype';
    }
}
