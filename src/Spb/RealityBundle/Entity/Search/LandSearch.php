<?php

namespace Spb\RealityBundle\Entity\Search;

use Symfony\Component\Validator\Constraints as Assert;


/**
 * Spb\RealityBundle\Entity\Search\LandSearch
 */
class LandSearch extends RealtySearch
{
    /**
     * мин. количество соток на участке
     * 
     * @var decimal $min_sm100
     * @Assert\Type(type="float")
     *
     */
    public $min_sm100;

    /**
     * макс. количество соток на участке
     * 
     * @var decimal $max_sm100
     * @Assert\Type(type="float")
     *
     */
    public $max_sm100;

    /**
     * тип дома
     * 
     * @var integer
     * @Assert\Type(type="array")
     * 
     */
    public $property_type;
    
    public function buildSearchQuery()
    {
        parent::buildSearchQuery();
        
        $qb = $this->qb;
        
        //Мин. кол-во комнат в аппартаментах
        if ($this->min_sm100) $qb->andWhere($qb->expr()->gte('r.sm100', $this->min_sm100));
        //Макс. кол-во комнат в аппартаментах
        if ($this->max_sm100) $qb->andWhere($qb->expr()->lte('r.sm100', $this->max_sm100));
        //Тип участка
        if ($this->property_type) $qb->andWhere($qb->expr()->in('r.property_type', $this->property_type));
        
        return $this;
    }    
    
}