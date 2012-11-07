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
     * @var decimal $minS
     *
     */
    public $min_s;

    /**
     * макс. общая площадь
     * 
     * @var decimal $maxS
     *
     */
    public $max_s;

    /**
     * статус апартаментов: первичка/вторичка
     * 
     * @var smallint
     */
    public $building_stage;
    
}