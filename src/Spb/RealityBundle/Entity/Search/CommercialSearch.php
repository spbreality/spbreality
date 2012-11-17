<?php

namespace Spb\RealityBundle\Entity\Search;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Spb\RealityBundle\Entity\Search\Commercial
 *
 */
class CommercialSearch extends RealtySearch
{

    /**
     * мин. площадь
     * 
     * @var decimal $min_s
     * @Assert\Type(type="float")
     *
     */
    public $min_s;

    /**
     * макс. площадь
     * 
     * @var decimal $max_s
     * @Assert\Type(type="float")
     *
     */
    public $max_s;

    /**
     * мин. цена за квадратный метр
     * 
     * @var decimal $min_price_per_m
     * @Assert\Type(type="float")
     *
     */
    public $min_price_per_m;

    /**
     * макс. цена за квадратный метр
     * 
     * @var decimal $max_price_per_m
     * @Assert\Type(type="float")
     *
     */
    public $max_price_per_m;

    public function buildSearchQuery()
    {
        parent::buildSearchQuery();
        
        $qb = $this->qb;
        
        //Мин. площадь
        if ($this->min_s) $qb->andWhere($qb->expr()->gte('r.s', $this->min_s));
        //Макс. площадь
        if ($this->max_s) $qb->andWhere($qb->expr()->lte('r.s', $this->max_s));
        //Мин. цена за кв. метр
        if ($this->min_price_per_m) $qb->andWhere($qb->expr()->gte('r.price*1000/r.s', $this->min_price_per_m));
        //Макс. цена за кв. метр
        if ($this->max_price_per_m) $qb->andWhere($qb->expr()->lte('r.price*1000/r.s', $this->max_price_per_m));
                
        return $this;
    }    

}