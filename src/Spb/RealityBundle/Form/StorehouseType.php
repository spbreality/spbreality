<?php

namespace Spb\RealityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class StorehouseType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('operation', null, array('label' => 'Тип операции',))                
            ->add('district', null, array('label' => 'Район'))
            ->add('address', null, array('label' => 'Адрес'))
            ->add('s', null, array('label' => 'Площадь'))
            ->add('approach_type', null, array('label' => 'Подъезд'))
            ->add('height', null, array('label' => 'Высота потолков(м)'))
            ->add('state_type', null, array('label' => 'Состояние'))
            ->add('price', null, array('label' => 'Цена в тыс. руб.'))
            ->add('sdesc', null, array('label' => 'Доп. сведения'))
            ->add('ldesc', null, array('label' => 'Описание'))
        ;
        
    }

    public function getName()
    {
        return 'spb_realitybundle_storehousetype';
    }
}
