<?php

namespace Spb\RealityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class HouseType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('operation', null, array('label' => 'Тип операции',))                
            ->add('district', null, array('label' => 'Район'))
            ->add('address', null, array('label' => 'Адрес'))
            ->add('sm100', null, array('label' => 'Кол-во соток'))
            ->add('property_type', null, array('label' => 'Тип собственности'))
            ->add('area', null, array('label' => 'Площадь дома'))
            ->add('floors', null, array('label' => 'Этажность'))
            ->add('house_type', null, array('label' => 'Дом'))
            ->add('price', null, array('label' => 'Цена в тыс. руб.'))
            ->add('sdesc', null, array('label' => 'Доп. сведения'))
            ->add('ldesc', null, array('label' => 'Описание'))
        ;
        
    }

    public function getName()
    {
        return 'spb_realitybundle_housetype';
    }
}
