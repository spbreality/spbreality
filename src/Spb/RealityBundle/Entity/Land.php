<?php

namespace Spb\RealityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Участок земли
 * 
 * Spb\RealityBundle\Entity\Land
 *
 * @ORM\Table(name="t12_land")
 * @ORM\Entity
 */
class Land extends Realty
{
    /**
     * количество соток
     * 
     * @var integer $sm100
     *
     * @ORM\Column(name="c12_sm100", type="integer")
     */
    private $sm100;
   
    /**
     * тип собственности на участок
     * 
     * @ORM\ManyToOne(targetEntity="PropertyType")
     * @ORM\JoinColumn(name="c12_property_type_id", referencedColumnName="c13_id")
     */
    private $property_type;

    /**
     * Тип объекта недвижимости
     *
     * @return string 
     */
    public function getRealtyType()
    {       
        return "land";
    }    

    /**
     * Set property_type
     *
     * @param Spb\RealityBundle\Entity\PropertyType $propertyType
     */
    public function setPropertyType(\Spb\RealityBundle\Entity\PropertyType $propertyType)
    {
        $this->property_type = $propertyType;
    }

    /**
     * Get property_type
     *
     * @return Spb\RealityBundle\Entity\PropertyType 
     */
    public function getPropertyType()
    {
        return $this->property_type;
    }

    /**
     * Set sm100
     *
     * @param integer $sm100
     */
    public function setSm100($sm100)
    {
        $this->sm100 = $sm100;
    }

    /**
     * Get sm100
     *
     * @return integer 
     */
    public function getSm100()
    {
        return $this->sm100;
    }
}