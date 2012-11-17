<?php

namespace Spb\RealityBundle\Form\Search;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class FlatSearchType extends ApartmentSearchType
{

    public function buildForm(FormBuilder $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
        $builder->add('min_s', null, array('required' => false, 'label' => 'от '))
                ->add('max_s', null, array('required' => false, 'label' => 'до '))
                ->add('building_stage', 'choice', array(
                    'choices' => $this->getBuildingStageChoices(),
                    'multiple' => true,
                    'expanded' => true,
                    'required' => false,
                    'label' => 'Тип объекта'));
    }
    
    function getName()
    {
        return 'f';
    }    
    
    private function getBuildingStageChoices()
    {
        $choices = array();
        $bstages = $this->doctrine->getRepository('SpbRealityBundle:BuildingStage')->findAll();

        foreach ($bstages as $bs) {
            $choices[$bs->getId()] = $bs->getName();
        }

        return $choices;

    }    
}

?>
