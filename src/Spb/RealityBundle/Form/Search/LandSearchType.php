<?php

namespace Spb\RealityBundle\Form\Search;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class LandSearchType extends RealtySearchType 
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        parent::buildForm($builder, $options);
                
        $builder->add('min_sm100', null, array('required' => false, 'label' => 'от '))
                ->add('max_sm100', null, array('required' => false, 'label' => 'до '))
                ->add('property_type', 'choice', array(
                    'choices' => $this->getPropertyTypeChoices(),
                    'multiple' => true,
                    'expanded' => false,
                    'required' => false,
                    'label' => 'Статус участка'));
    }
    
    function getName()
    {
        return 'l';
    }    
    
    private function getPropertyTypeChoices()
    {
        $choices = array();
        $ptypes = $this->doctrine->getRepository('SpbRealityBundle:PropertyType')->findAll();

        foreach ($ptypes as $pt) {
            $choices[$pt->getId()] = $pt->getName();
        }

        return $choices;

    }    
}

?>
