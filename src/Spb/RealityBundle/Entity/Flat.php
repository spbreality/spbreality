<?php

namespace Spb\RealityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Spb\RealityBundle\Entity\Flat
 *
 * @ORM\Table(name="t04_flat")
 * @ORM\Entity(repositoryClass="Spb\RealityBundle\Entity\FlatRepository")
 */
class Flat extends Apartment
{

    /**
     * общая площадь
     * 
     * @var decimal $s
     *
     * @ORM\Column(name="c04_s", type="decimal", scale=2)
     */
    private $s;

    /**
     * статус квартиры: первичка/вторичка
     * 
     * @ORM\ManyToOne(targetEntity="BuildingStage")
     * @ORM\JoinColumn(name="c04_building_stage_id", referencedColumnName="c05_id")
     */
    private $building_stage;
    
    /**
     * Set s
     *
     * @param decimal $s
     */
    public function setS($s)
    {
        $this->s = $s;
    }

    /**
     * Get s
     *
     * @return decimal 
     */
    public function getS()
    {
        return $this->s;
    }

    /**
     * Get realty type
     *
     * @return string 
     */
    public function getRealtyType()
    {       
        return "flat";
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
     * Get building_stage
     *
     * @return Spb\RealityBundle\Entity\BuildingStage 
     */
    public function getBuildingStage()
    {
        return $this->building_stage;
    }
}