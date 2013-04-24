<?php

namespace Spb\RealityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Spb\RealityBundle\Entity\RssNews;


/**
 * News controller.
 */
class NewsController extends Controller {

    /**
     * Показать rss новости с bn.ru.
     * Источник: http://www.bn.ru/rss/news.xml
     * 
     * @Route("/news", name="spb_news")
     */
    public function newsAction() {
        
        $rss = $this->get('rss_parser');        
        $rss->load($this->container->getParameter('bn_rss_news'));
        $items = $rss->getItems();

        $response = $this->render('SpbRealityBundle:News:bn_news.html.twig', array('items' => $items));
        
        // пометить ответ как public или private
        $response->setPublic();
        //$response->setPrivate();

        // установить max age для private и shared ответов
        $response->setMaxAge(6000);
        $response->setSharedMaxAge(6000);

        // установить специальную директиву Cache-Control
        $response->headers->addCacheControlDirective('must-revalidate', true);
                
        return $response;
        
    }

    /**
     * Показать rss видео новости с bn.ru.
     * Источник: http://www.bn.ru/rss/video.xml
     * 
     * @Route("/tv", name="spb_tv")
     */
    public function tvAction() {
        
        $rss = $this->get('rss_parser');
        $rss->load($this->container->getParameter('bn_rss_videos'));
        $items = $rss->getItems(true);
        
        $response = $this->render('SpbRealityBundle:News:bn_tv.html.twig', array('items' => $items));
        
        // пометить ответ как public или private
        $response->setPublic();
        //$response->setPrivate();

        // установить max age для private и shared ответов
        $response->setMaxAge(6000);
        $response->setSharedMaxAge(6000);

        // установить специальную директиву Cache-Control
        $response->headers->addCacheControlDirective('must-revalidate', true);
               
        return $response;
    }
    
    /**
     * Показать последние видео новости, с bn.ru
     * Например, на домашней странице
     * Источник: http://www.bn.ru/rss/video.xml
     * 
     * @Route("/latest_vnews", name="spb_latest_vnews")
     */    
    public function recentVnewsAction()
    { 
        $rss = $this->get('rss_parser');
        $rss->load($this->container->getParameter('bn_rss_videos'));
        $items = $rss->getItems(true);

        $response = $this->render(
            'SpbRealityBundle:News:recent_vnews.html.twig',
            array('items' => $items)
        );
        
        // пометить ответ как public или private
        $response->setPublic();
        //$response->setPrivate();

        // установить max age для private и shared ответов
        $response->setMaxAge(6000);
        $response->setSharedMaxAge(6000);

        // установить специальную директиву Cache-Control
        $response->headers->addCacheControlDirective('must-revalidate', true);
                
        return $response;
    }    

}
