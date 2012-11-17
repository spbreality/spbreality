<?php

namespace Spb\RealityBundle\Form\Search;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ApartmentSearchType extends RealtySearchType 
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        parent::buildForm($builder, $options);
                
        $builder->add('min_rooms', null, array('required' => false, 'label' => 'от '))
                ->add('max_rooms', null, array('required' => false, 'label' => 'до '))
                ->add('min_sl', null, array('required' => false, 'label' => 'от '))
                ->add('max_sl', null, array('required' => false, 'label' => 'до '))
                ->add('min_sk', null, array('required' => false, 'label' => 'от '))
                ->add('max_sk', null, array('required' => false, 'label' => 'до '))
                ->add('first_floor', 'checkbox', array('required' => false, 'label' => ' не первый '))
                ->add('last_floor', 'checkbox', array('required' => false, 'label' => ' не последний '))
                ->add('building_type', 'choice', array(
                    'choices' => $this->getBuildingTypeChoices(),
                    'multiple' => true,
                    'expanded' => false,
                    'required' => false,
                    'label' => 'Тип/материал дома'));
    }
    
    function getName()
    {
        return 'spb_realitybundle_apartmentsearchtype';
    }    
    
    private function getBuildingTypeChoices()
    {
        $choices = array();
        $btypes = $this->doctrine->getRepository('SpbRealityBundle:BuildingType')->findAll();

        foreach ($btypes as $bt) {
            $choices[$bt->getId()] = $bt->getName();
        }

        return $choices;

    }    
}

?>
