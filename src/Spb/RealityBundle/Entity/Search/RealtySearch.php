<?php

namespace Spb\RealityBundle\Entity\Search;

use Symfony\Component\Validator\Constraints as Assert;


/**
 * Spb\RealityBundle\Entity\Search\RealtySearch
 */

class RealtySearch
{
    /*
     *  QueryBuilder
     */
    public $qb;
     
    /**
     * мин. цена на объект недвижимости
     * 
     * @var decimal $minPrice
     * @Assert\Type(type="numeric")
     */
    public $min_price;
    
    /**
     * макс. цена на объект недвижимости
     * 
     * @var decimal $maxPrice
     * @Assert\Type(type="numeric")
     *
     */
    public $max_price;
   
    /**
     * адрес объекта недвижимости
     * 
     * @var string $address
     * @Assert\Type(type="string")
     *
     */
    public $address;
    
    /**
     * район объекта недвижимости
     * 
     * @var integer[]
     * @Assert\Type(type="array")
     * 
     */
    public $district;
    
    /**
     * тип операции по объекту недвижимости (продажа/аренда)
     * 
     * @var integer[]
     * @Assert\Type(type="array")
     * 
     */
    public $operation;
    
    /*
        *  конструктор иницилизирует query builder
        */
    public function __construct(\Doctrine\ORM\QueryBuilder $query_builder) 
    {
        $this->qb = $query_builder;
    }        
   
    public function buildSearchQuery()
    {
        $qb = $this->qb;
        
        //Мин. цена на объект недвижимости
        if ($this->min_price) $qb->andWhere($qb->expr()->gte('r.price', $this->min_price));
        //Макс. цена на объект недвижимости
        if ($this->max_price) $qb->andWhere($qb->expr()->lte('r.price', $this->max_price));
        //Адрес объекта недвижимости
        if ($this->address) $qb->andWhere($qb->expr()->like('r.address', $qb->expr()->literal('%'.$this->address.'%')));
        //Район 
        if ($this->district) $qb->andWhere($qb->expr()->in('r.district', $this->district));
        //Операция (продажа/аренда)
        if ($this->operation) $qb->andWhere($qb->expr()->in('r.operation', $this->operation));
        
        return $this;
    }

}