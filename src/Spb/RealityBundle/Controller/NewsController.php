<?php

namespace Spb\RealityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
        
        $rss = new RssNews();
        
        $rss->load('http://www.bn.ru/rss/news.xml');
        $items = $rss->getItems();

        return $this->render('SpbRealityBundle:News:bn_news.html.twig', array('items' => $items));
    }

    /**
     * Показать rss видео новости с bn.ru.
     * Источник: http://www.bn.ru/rss/video.xml
     * 
     * @Route("/tv", name="spb_tv")
     */
    public function tvAction() {
        
        $rss = new RssNews();        
        $rss->load('http://www.bn.ru/rss/video.xml');
        $items = $rss->getItems(true);
        
        return $this->render('SpbRealityBundle:News:bn_tv.html.twig', array('items' => $items));
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
        $rss = new RssNews();       
        $rss->load('http://www.bn.ru/rss/video.xml');
        $items = $rss->getItems(true);

        return $this->render(
            'SpbRealityBundle:News:recent_vnews.html.twig',
            array('items' => $items)
        );
    }    

}
