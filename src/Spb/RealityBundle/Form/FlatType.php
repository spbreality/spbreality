<?php

namespace Spb\RealityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class FlatType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('rooms')
            ->add('price')
            ->add('floor')
            ->add('floors')
            ->add('s')
            ->add('sl')
            ->add('sk')
            ->add('t1or2')
            ->add('btype')
            ->add('otype')
            ->add('sdesc')
            ->add('ldesc')
            ->add('address')
            ->add('district')
        ;
    }

    public function getName()
    {
        return 'spb_realitybundle_flattype';
    }
}
