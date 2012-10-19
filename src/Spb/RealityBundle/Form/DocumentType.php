<?php

namespace Spb\RealityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class DocumentType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title', null, array('label' => 'Название фотографии'))
            ->add('desc', null, array('label' => 'Краткое описание'))
            ->add('realty', null, array('attr'=> array('style'=>'display:none')))
            ->add('file', null, array('label' => 'Файл'))
        ;
    }

    public function getName()
    {
        return 'spb_realitybundle_documenttype';
    }
}
