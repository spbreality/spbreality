<?php

namespace Spb\RealityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Контроллер для продвижения объектов недвижимости.
 */
class MarketingController extends Controller
{
    
    /**
     * Показать рекламируемые объекты
     * на главной странице
     * 
     * @Route("/advertised_objects", name="spb_advertised_objects")
     */    
    public function advertisedObjectsAction()
    { 
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('SpbRealityBundle:Realty')->findByAdv(1);
          
        $response = $this->render(
            'SpbRealityBundle:Marketing:advertised_objects.html.twig',
            array('entities' => $entities)
        );
        
        // пометить ответ как public или private
        $response->setPublic();
        //$response->setPrivate();

        // установить max age для private и shared ответов
        $response->setMaxAge(7);
        $response->setSharedMaxAge(7);

        // установить специальную директиву Cache-Control
        $response->headers->addCacheControlDirective('must-revalidate', true);
                
        return $response;
    }    
}