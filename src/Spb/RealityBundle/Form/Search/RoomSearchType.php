<?php

namespace Spb\RealityBundle\Form\Search;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class RoomSearchType extends ApartmentSearchType
{

    public function buildForm(FormBuilder $builder, array $options)
    {
        parent::buildForm($builder, $options);        
    }
    
    function getName()
    {
        return 'r';
    }    
    
}

?>
