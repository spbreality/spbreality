<?php

namespace Spb\RealityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class FlatType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('operation', null, array('label' => 'Тип операции',))                
            ->add('district', null, array('label' => 'Район'))
            ->add('address', null, array('label' => 'Адрес'))
            ->add('building_stage', null, array('label' => 'Статус',))
            ->add('building_type', null, array('label' => 'Материал дома',))
            ->add('floor', null, array('label' => 'Этаж'))
            ->add('floors', null, array('label' => 'Этажность'))
            ->add('rooms', null, array('label' => 'Кол-во комнат'))
            ->add('s', null, array('label' => 'Общая площадь'))
            ->add('sl', null, array('label' => 'Жилая площадь'))
            ->add('sk', null, array('label' => 'Площадь кухни'))
            ->add('price', null, array('label' => 'Цена в тыс. руб.'))
            ->add('sdesc', null, array('label' => 'Доп. сведения'))
            ->add('ldesc', null, array('label' => 'Описание'))
        ;
    }

    public function getName()
    {
        return 'spb_realitybundle_flattype';
    }
}
