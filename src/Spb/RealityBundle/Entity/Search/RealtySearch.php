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
    public $minPrice;
    
    /**
     * макс. цена на объект недвижимости
     * 
     * @var decimal $maxPrice
     *
     */
    public $maxPrice;
   
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

}