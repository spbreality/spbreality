<?php

namespace Spb\RealityBundle\Entity\Search;

/**
 * Spb\RealityBundle\Entity\Search\RealtySearch
 */

class RealtySearch
{
     
    /**
     * мин. цена на объект недвижимости
     * 
     * @var decimal $minPrice
     *
     */
    public $min_price;
    
    /**
     * макс. цена на объект недвижимости
     * 
     * @var decimal $maxPrice
     *
     */
    public $max_price;
   
    /**
     * адрес объекта недвижимости
     * 
     * @var string $address
     *
     */
    public $address;
    
    /**
     * район объекта недвижимости
     * 
     * @var integer
     * 
     */
    public $district;
    
    /**
     * тип операции по объекту недвижимости (продажа/аренда)
     * 
     * @var integer
     * 
     */
    public $operation;    

}