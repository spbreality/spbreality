<?php

namespace Spb\RealityBundle\Entity\Search;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Spb\RealityBundle\Entity\Search\Flat
 *
 */
class FlatSearch extends ApartmentSearch
{

    /**
     * мин. общая площадь
     * 
     * @var decimal $min_s
     * @Assert\Type(type="float")
     *
     */
    public $min_s;

    /**
     * макс. общая площадь
     * 
     * @var decimal $max_s
     * @Assert\Type(type="float")
     *
     */
    public $max_s;

    /**
     * статус апартаментов: первичка/вторичка
     * 
     * @var smallint[]
     * @Assert\Type(type="array")
     */
    public $building_stage;

    public function buildSearchQuery()
    {
        parent::buildSearchQuery();
        
        $qb = $this->qb;
        
        //Мин. общая площадь квартиры
        if ($this->min_s) $qb->andWhere($qb->expr()->gte('r.s', $this->min_s));
        //Макс. общая площадь квартиры
        if ($this->max_s) $qb->andWhere($qb->expr()->lte('r.s', $this->max_s));
        //Тип дома
        if ($this->building_stage) $qb->andWhere($qb->expr()->in('r.building_stage', $this->building_stage));
                
        return $this;
    }    

}