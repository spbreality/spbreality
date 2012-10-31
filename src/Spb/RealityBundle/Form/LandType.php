<?php

namespace Spb\RealityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class LandType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('operation', null, array('label' => 'Тип операции',))                
            ->add('district', null, array('label' => 'Район'))
            ->add('address', null, array('label' => 'Адрес'))
            ->add('sm100', null, array('label' => 'Уч сот'))
            ->add('property_type', null, array('label' => 'Тип собственности'))
            ->add('price', null, array('label' => 'Цена в тыс. руб.'))
            ->add('sdesc', null, array('label' => 'Доп. сведения'))
            ->add('ldesc', null, array('label' => 'Описание'))
        ;
        
    }

    public function getName()
    {
        return 'spb_realitybundle_landtype';
    }
}
