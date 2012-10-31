<?php

namespace Spb\RealityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Дом
 * 
 * Spb\RealityBundle\Entity\House
 *
 * @ORM\Table(name="t14_house")
 * @ORM\Entity
 */
class House extends Land
{
    /**
     * площадь дома
     * 
     * @var integer $area
     *
     * @ORM\Column(name="c14_area", type="integer")
     */
    private $area;
   
    /**
     * этажность
     * 
     * @var integer $floors
     *
     * @ORM\Column(name="c14_floors", type="integer")
     */
    private $floors;

    /**
     * тип дома
     * 
     * @ORM\ManyToOne(targetEntity="HouseType")
     * @ORM\JoinColumn(name="c14_house_type_id", referencedColumnName="c15_id")
     */
    private $house_type;

    /**
     * Тип объекта недвижимости
     *
     * @return string 
     */
    public function getRealtyType()
    {       
        return "house";
    }    


    /**
     * Set area
     *
     * @param integer $area
     */
    public function setArea($area)
    {
        $this->area = $area;
    }

    /**
     * Get area
     *
     * @return integer 
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set floors
     *
     * @param integer $floors
     */
    public function setFloors($floors)
    {
        $this->floors = $floors;
    }

    /**
     * Get floors
     *
     * @return integer 
     */
    public function getFloors()
    {
        return $this->floors;
    }

    /**
     * Set house_type
     *
     * @param Spb\RealityBundle\Entity\HouseType $houseType
     */
    public function setHouseType(\Spb\RealityBundle\Entity\HouseType $houseType)
    {
        $this->house_type = $houseType;
    }

    /**
     * Get house_type
     *
     * @return Spb\RealityBundle\Entity\HouseType 
     */
    public function getHouseType()
    {
        return $this->house_type;
    }
}