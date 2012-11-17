<?php

namespace Spb\RealityBundle\Entity\Search;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Spb\RealityBundle\Entity\Search\Land
 *
 */
class HouseSearch extends LandSearch
{

    /**
     * мин. площадь дома
     * 
     * @var decimal $min_area
     * @Assert\Type(type="float")
     *
     */
    public $min_area;

    /**
     * макс. площадь дома
     * 
     * @var decimal $max_area
     * @Assert\Type(type="float")
     *
     */
    public $max_area;

    /**
     * Материал дома
     * 
     * @var smallint[]
     * @Assert\Type(type="array")
     */
    public $house_type;

    public function buildSearchQuery()
    {
        parent::buildSearchQuery();
        
        $qb = $this->qb;
        
        //Мин. площадь дома
        if ($this->min_area) $qb->andWhere($qb->expr()->gte('r.area', $this->min_area));
        //Макс. общая площадь квартиры
        if ($this->max_area) $qb->andWhere($qb->expr()->lte('r.area', $this->max_area));
        //Тип дома
        if ($this->house_type) $qb->andWhere($qb->expr()->in('r.house_type', $this->house_type));
                
        return $this;
    }    

}