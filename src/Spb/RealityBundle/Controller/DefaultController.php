<?php

namespace Spb\RealityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('SpbRealityBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function realtyAction($name)
    {
        return $this->render('SpbRealityBundle:Default:realty.html.twig', array('name' => $name));
    }
    
}
