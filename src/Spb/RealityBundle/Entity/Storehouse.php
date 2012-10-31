<?php

namespace Spb\RealityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Складские и производственные помещения
 * 
 * Spb\RealityBundle\Entity\Storehouse
 *
 * @ORM\Table(name="t19_storehouse")
 * @ORM\Entity
 */
class Storehouse extends Commercial
{
    /**
     * тип подъезда
     * 
     * @ORM\ManyToOne(targetEntity="ApproachType")
     * @ORM\JoinColumn(name="c20_approach_type_id", referencedColumnName="c21_id")
     */
    private $approach_type;

    /**
     * высота потолков
     * 
     * @var decimal $height
     *
     * @ORM\Column(name="c20_height", type="decimal", scale="2")
     */
    private $height;
    

    /**
     * Тип объекта недвижимости
     *
     * @return string 
     */
    public function getRealtyType()
    {       
        return "storehouse";
    }    
    


    /**
     * Set height
     *
     * @param decimal $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * Get height
     *
     * @return decimal 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set approach_type
     *
     * @param Spb\RealityBundle\Entity\ApproachType $approachType
     */
    public function setApproachType(\Spb\RealityBundle\Entity\ApproachType $approachType)
    {
        $this->approach_type = $approachType;
    }

    /**
     * Get approach_type
     *
     * @return Spb\RealityBundle\Entity\ApproachType 
     */
    public function getApproachType()
    {
        return $this->approach_type;
    }
}