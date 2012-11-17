<?php

namespace Spb\RealityBundle\Form\Search;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class OfficeSearchType extends CommercialSearchType 
{    
    function getName()
    {
        return 'o';
    }    
}

?>
