<?php

namespace Spb\RealityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Отдельно стоящие здания
 * 
 * Spb\RealityBundle\Entity\Building
 *
 * @ORM\Table(name="t22_building")
 * @ORM\Entity
 */
class Building extends Commercial
{
    /**
     * Всего этажей
     * 
     * @var smallint $floors
     *
     * @ORM\Column(name="c22_floors", type="smallint")
     */
    private $floors;

    /**
     * площадь участка
     * 
     * @var decimal $area
     *
     * @ORM\Column(name="c22_area", type="decimal", scale="2")
     */
    private $area;
    
    /**
     * Тип объекта недвижимости
     *
     * @return string 
     */
    public function getRealtyType()
    {       
        return "building";
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
     * Set area
     *
     * @param decimal $area
     */
    public function setArea($area)
    {
        $this->area = $area;
    }

    /**
     * Get area
     *
     * @return decimal 
     */
    public function getArea()
    {
        return $this->area;
    }
}