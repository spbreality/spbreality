<?php

namespace Spb\RealityBundle\Form\Search;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class FlatSearchType extends AbstractType {

   public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('minRooms', null, array('required' => false, 'label' => 'от '))
                ->add('maxRooms', null, array('required' => false, 'label' => 'до '))
                ->add('minPrice', null, array('required' => false, 'label' => 'от '))
                ->add('maxPrice', null, array('required' => false, 'label' => 'до '));
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
