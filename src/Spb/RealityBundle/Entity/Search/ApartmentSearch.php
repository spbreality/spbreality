<?php

namespace Spb\RealityBundle\Entity\Search;

/**
 * Spb\RealityBundle\Entity\Search\ApartmentSearch
 */
class ApartmentSearch extends RealtySearch
{
    /**
     * мин. количество комнат в апартаментах
     * 
     * @var smallint $minRooms
     *
     */
    public $min_rooms;

    /**
     * макс. количество комнат в апартаментах
     * 
     * @var smallint $maxRooms
     *
     */
    public $max_rooms;

    /**
     * 1ый этаж
     * 
     * @var smallint $firstFloor
     *
     */
    public $first_floor;

    /**
     * последний этаж
     * 
     * @var smallint $lastFloor
     *
     */
    public $last_floor;

    /**
     * мин. площадь кухни
     * 
     * @var decimal $sk
     *
     */
    public $min_sk;

    /**
     * макс. площадь кухни
     * 
     * @var decimal $sk
     *
     */
    public $max_sk;
    
    /**
     * тип дома
     * 
     * @var integer
     */
    public $building_type;

}