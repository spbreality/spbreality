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
    public $minRooms;

    /**
     * макс. количество комнат в апартаментах
     * 
     * @var smallint $maxRooms
     *
     */
    public $maxRooms;

    /**
     * 1ый этаж
     * 
     * @var smallint $firstFloor
     *
     */
    public $firstFloor;

    /**
     * последний этаж
     * 
     * @var smallint $lastFloor
     *
     */
    public $lastFloor;

    /**
     * мин. площадь кухни
     * 
     * @var decimal $sk
     *
     */
    public $minSk;

    /**
     * макс. площадь кухни
     * 
     * @var decimal $sk
     *
     */
    public $maxSk;
    
    /**
     * тип дома
     * 
     * @var integer
     */
    public $building_type;

}