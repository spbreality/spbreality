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
    public $minS;

    /**
     * макс. общая площадь
     * 
     * @var decimal $maxS
     *
     */
    public $maxS;

    /**
     * статус апартаментов: первичка/вторичка
     * 
     * @var smallint
     */
    public $building_stage;
    
}