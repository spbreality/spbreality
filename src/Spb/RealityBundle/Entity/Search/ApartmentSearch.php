<?php

namespace Spb\RealityBundle\Entity\Search;

use Symfony\Component\Validator\Constraints as Assert;


/**
 * Spb\RealityBundle\Entity\Search\ApartmentSearch
 */
class ApartmentSearch extends RealtySearch
{
    /**
     * мин. количество комнат в апартаментах
     * 
     * @var smallint $min_rooms
     * @Assert\Type(type="integer")
     *
     */
    public $min_rooms;

    /**
     * макс. количество комнат в апартаментах
     * 
     * @var smallint $max_rooms
     * @Assert\Type(type="integer")
     *
     */
    public $max_rooms;

    /**
     * 1ый этаж
     * 
     * @var smallint $first_floor
     * @Assert\Type(type="integer")
     *
     */
    public $first_floor;

    /**
     * последний этаж
     * 
     * @var smallint $last_floor
     * @Assert\Type(type="integer")
     *
     */
    public $last_floor;

    /**
     * мин. площадь кухни
     * 
     * @var decimal $min_sk
     * @Assert\Type(type="float")
     *
     */
    public $min_sk;

    /**
     * макс. площадь кухни
     * 
     * @var decimal $max_sk
     * @Assert\Type(type="float")
     *
     */
    public $max_sk;
    
    /**
     * мин. жилая площадь
     * 
     * @var decimal $min_sl
     * @Assert\Type(type="float")
     *
     */
    public $min_sl;

    /**
     * макс. жилая площадь
     * 
     * @var decimal $max_sl
     * @Assert\Type(type="float")
     *
     */
    public $max_sl;

    /**
     * тип дома
     * 
     * @var integer $building_type
     * @Assert\Type(type="array")
     * 
     */
    public $building_type;
    
    public function buildSearchQuery()
    {
        parent::buildSearchQuery();
        
        $qb = $this->qb;
        
        //Мин. кол-во комнат в аппартаментах
        if ($this->min_rooms) $qb->andWhere($qb->expr()->gte('r.rooms', $this->min_rooms));
        //Макс. кол-во комнат в аппартаментах
        if ($this->max_rooms) $qb->andWhere($qb->expr()->lte('r.rooms', $this->max_rooms));
        //Мин. площадь кухни в аппартаментах
        if ($this->min_sk) $qb->andWhere($qb->expr()->gte('r.sk', $this->min_sk));
        //Макс. площадь кухни в аппартаментах
        if ($this->max_sk) $qb->andWhere($qb->expr()->lte('r.sk', $this->max_sk));
        //Мин. жилая площадь в аппартаментах
        if ($this->min_sl) $qb->andWhere($qb->expr()->gte('r.sl', $this->min_sl));
        //Макс. жилая площадь в аппартаментах
        if ($this->max_sl) $qb->andWhere($qb->expr()->lte('r.sl', $this->max_sl));
        //Тип дома
        if ($this->building_type) $qb->andWhere($qb->expr()->in('r.building_type', $this->building_type));
        //Не первый этаж
        if ($this->first_floor) $qb->andWhere($qb->expr()->gt('r.floor', 1));
        //Не последний этаж
        if ($this->last_floor) $qb->andWhere($qb->expr()->lt('r.floor', 'r.floors'));
        
        return $this;
    }    
    
}