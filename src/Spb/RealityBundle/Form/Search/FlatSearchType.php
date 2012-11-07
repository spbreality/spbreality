<?php

namespace Spb\RealityBundle\Form\Search;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class FlatSearchType extends AbstractType {

   public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('min_rooms', null, array('required' => false, 'label' => 'от '))
                ->add('max_rooms', null, array('required' => false, 'label' => 'до '))
                ->add('min_price', null, array('required' => false, 'label' => 'от '))
                ->add('max_price', null, array('required' => false, 'label' => 'до '))
                ->add('min_s', null, array('required' => false, 'label' => 'от '))
                ->add('max_s', null, array('required' => false, 'label' => 'до '))
                ->add('min_sk', null, array('required' => false, 'label' => 'от '))
                ->add('max_sk', null, array('required' => false, 'label' => 'до '))
                ->add('district', 'entity', array(
                    'class' => 'SpbRealityBundle:District',
                    'multiple' => true,
                    'expanded' => false,
                    'required' => false,
                    'label' => 'Район'))
                ->add('building_stage', 'entity', array(
                    'class' => 'SpbRealityBundle:BuildingStage',
                    'multiple' => true,
                    'expanded' => true,
                    'required' => false,
                    'label' => 'Тип объекта'))
                ->add('building_type', 'entity', array(
                    'class' => 'SpbRealityBundle:BuildingType',
                    'multiple' => true,
                    'expanded' => false,
                    'required' => false,
                    'label' => 'Тип/материал дома'))
                ->add('operation', 'entity', array(
                    'class' => 'SpbRealityBundle:Operation',
                    'multiple' => true,
                    'expanded' => true,
                    'required' => false,
                    'label' => 'Тип операции'))
                ->add('address', null, array('required' => false, 'label' => 'адрес')
                );
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'csrf_protection' => false,
        );
    }

    function getName()
    {
        return 'spb_realitybundle_flatsearchtype';
    }    
}

?>
