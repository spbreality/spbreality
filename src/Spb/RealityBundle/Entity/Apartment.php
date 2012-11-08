<?php

namespace Spb\RealityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Апартаменты: комнаты, квартиры
 * 
 * Spb\RealityBundle\Entity\Apartment
 *
 * @ORM\Table(name="t10_apartment")
 * @ORM\Entity
 */
class Apartment extends Realty
{
    /**
     * количество комнат в апартаментах
     * 
     * @var smallint $rooms
     *
     * @ORM\Column(name="c10_rooms", type="smallint")
     */
    private $rooms;

    /**
     * этаж
     * 
     * @var smallint $floor
     *
     * @ORM\Column(name="c10_floor", type="smallint")
     */
    private $floor;

    /**
     * всего этажей
     * 
     * @var smallint $floors
     *
     * @ORM\Column(name="c10_floors", type="smallint")
     */
    private $floors;

    /**
     * жилая площадь
     * 
     * @var decimal $sl
     *
     * @ORM\Column(name="c10_sl", type="decimal", scale=2)
     */
    private $sl;

    /**
     * площадь кухни
     * 
     * @var decimal $sk
     *
     * @ORM\Column(name="c10_sk", type="decimal", scale=2)
     */
    private $sk;
  
    /**
     * тип дома
     * 
     * @ORM\ManyToOne(targetEntity="BuildingType")
     * @ORM\JoinColumn(name="c10_building_type_id", referencedColumnName="c03_id")
     */
    private $building_type;

    /**
     * тип санузла
     * 
     * @ORM\ManyToOne(targetEntity="BathunitType")
     * @ORM\JoinColumn(name="c10_bathunit_type_id", referencedColumnName="c11_id")
     */
    private $bathunit_type;

    /**
     * Set rooms
     *
     * @param smallint $rooms
     */
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;
    }

    /**
     * Get rooms
     *
     * @return smallint 
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * Set floor
     *
     * @param smallint $floor
     */
    public function setFloor($floor)
    {
        $this->floor = $floor;
    }

    /**
     * Get floor
     *
     * @return smallint 
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * Set floors
     *
     * @param smallint $floors
     */
    public function setFloors($floors)
    {
        $this->floors = $floors;
    }

    /**
     * Get floors
     *
     * @return smallint 
     */
    public function getFloors()
    {
        return $this->floors;
    }

    /**
     * Set sl
     *
     * @param string $sl
     */
    public function setSl($sl)
    {
        $this->sl = $sl;
    }

    /**
     * Get sl
     *
     * @return string 
     */
    public function getSl()
    {
        return $this->sl;
    }

    /**
     * Set sk
     *
     * @param decimal $sk
     */
    public function setSk($sk)
    {
        $this->sk = $sk;
    }

    /**
     * Get sk
     *
     * @return decimal 
     */
    public function getSk()
    {
        return $this->sk;
    }

    /**
     * Set building_stage
     *
     * @param Spb\RealityBundle\Entity\BuildingStage $buildingStage
     */
    public function setBuildingStage(\Spb\RealityBundle\Entity\BuildingStage $buildingStage)
    {
        $this->building_stage = $buildingStage;
    }

    /**
     * Get building_type
     *
     * @return Spb\RealityBundle\Entity\BuildingType 
     */
    public function getBuildingType()
    {
        return $this->building_type;
    }

    /**
     * Set bathunit_type
     *
     * @param Spb\RealityBundle\Entity\BathunitType $bathunitType
     */
    public function setBathunitType(\Spb\RealityBundle\Entity\BathunitType $bathunitType)
    {
        $this->bathunit_type = $bathunitType;
    }

    /**
     * Get bathunit_type
     *
     * @return Spb\RealityBundle\Entity\BathunitType 
     */
    public function getBathunitType()
    {
        return $this->bathunit_type;
    }

    /**
     * Set building_type
     *
     * @param Spb\RealityBundle\Entity\BuildingType $buildingType
     */
    public function setBuildingType(\Spb\RealityBundle\Entity\BuildingType $buildingType)
    {
        $this->building_type = $buildingType;
    }
}