<?php

namespace Spb\RealityBundle\Form\Search;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class RealtySearchType extends AbstractType 
{

    protected $doctrine;

    public function __construct($doctrine)
    {
        $this->doctrine = $doctrine;
    }
    
    public function buildForm(FormBuilder $builder, array $options)
    {
        
       $builder->add('min_price', null, array('required' => false, 'label' => 'от '))
               ->add('max_price', null, array('required' => false, 'label' => 'до '))
               ->add('district', 'choice', array(
                    'choices' => $this->getDistrictChoices(),
                    'multiple' => true,
                    'expanded' => false,
                    'required' => false,
                    'label' => 'Район'))
               ->add('operation', 'choice', array(
                    'choices' => $this->getOperationChoices(),
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
        return 'spb_realitybundle_realtysearchtype';
    }    
    
    private function getOperationChoices()
    {
        $choices = array();
        $operations = $this->doctrine->getRepository('SpbRealityBundle:Operation')->findAll();

        foreach ($operations as $operation) {
            $choices[$operation->getId()] = $operation->getName();
        }

        return $choices;

    }
    
    private function getDistrictChoices()
    {
        $choices = array();
        $districts = $this->doctrine->getRepository('SpbRealityBundle:District')->findAll();

        foreach ($districts as $district) {
            $choices[$district->getId()] = $district->__toString();
        }

        return $choices;

    }    
    
}

?>
