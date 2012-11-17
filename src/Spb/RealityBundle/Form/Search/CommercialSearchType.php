<?php

namespace Spb\RealityBundle\Form\Search;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CommercialSearchType extends RealtySearchType 
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        parent::buildForm($builder, $options);
                
        $builder->add('min_s', null, array('required' => false, 'label' => 'от '))
                ->add('max_s', null, array('required' => false, 'label' => 'до '))
                ->add('min_price_per_m', null, array('required' => false, 'label' => 'от '))
                ->add('max_price_per_m', null, array('required' => false, 'label' => 'до '));
    }
    
    function getName()
    {
        return 'c';
    }    
    
}

?>
