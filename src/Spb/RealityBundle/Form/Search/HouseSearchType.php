<?php

namespace Spb\RealityBundle\Form\Search;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class HouseSearchType extends LandSearchType
{

    public function buildForm(FormBuilder $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
        $builder->add('min_area', null, array('required' => false, 'label' => 'от '))
                ->add('max_area', null, array('required' => false, 'label' => 'до '))
                ->add('house_type', 'choice', array(
                    'choices' => $this->getHouseTypeChoices(),
                    'multiple' => true,
                    'expanded' => false,
                    'required' => false,
                    'label' => 'Тип объекта'));
    }
    
    function getName()
    {
        return 'h';
    }    
    
    private function getHouseTypeChoices()
    {
        $choices = array();
        $htypes = $this->doctrine->getRepository('SpbRealityBundle:HouseType')->findAll();

        foreach ($htypes as $ht) {
            $choices[$ht->getId()] = $ht->getName();
        }

        return $choices;

    }    
}

?>
