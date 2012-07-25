<?php

namespace Spb\RealityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class RoomType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('price')
            ->add('sdesc')
            ->add('ldesc')
            ->add('address')
            ->add('rooms')
            ->add('operation')
            ->add('district')
        ;
    }

    public function getName()
    {
        return 'spb_realitybundle_roomtype';
    }
}
