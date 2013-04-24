<?php

namespace Spb\RealityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class OfficeType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('operation', null, array('label' => 'Тип операции',))                
            ->add('district', null, array('label' => 'Район'))
            ->add('address', null, array('label' => 'Адрес'))
            ->add('s', null, array('label' => 'Площадь'))
            ->add('floor', null, array('label' => 'Этаж'))
            ->add('floors', null, array('label' => 'Этажей'))
            ->add('entry_type', null, array('label' => 'Вход'))
            ->add('state_type', null, array('label' => 'Состояние'))
            ->add('price', null, array('label' => 'Цена в тыс. руб.'))
            ->add('sdesc', null, array('label' => 'Доп. сведения'))
            ->add('ldesc', null, array('label' => 'Описание'))
            ->add('adv', 'choice',array(
                'choices' => array('1' => 'На главной странице'),
                'required'    => false,
                'label' => 'Реклама'))
        ;
        
    }

    public function getName()
    {
        return 'spb_realitybundle_officetype';
    }
}
