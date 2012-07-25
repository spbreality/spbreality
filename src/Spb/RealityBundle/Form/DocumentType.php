<?php

namespace Spb\RealityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class DocumentType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('path')
            ->add('title')
            ->add('desc')
            ->add('realty')
            ->add('file')
        ;
    }

    public function getName()
    {
        return 'spb_realitybundle_documenttype';
    }
}
