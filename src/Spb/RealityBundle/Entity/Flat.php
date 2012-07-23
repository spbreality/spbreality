<?php

namespace Spb\RealityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Spb\RealityBundle\Entity\Flat
 *
 * @ORM\Table(name="t04_flat")
 * @ORM\Entity(repositoryClass="Spb\RealityBundle\Entity\FlatRepository")
 */
class Flat
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="c04_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var smallint $rooms
     *
     * @ORM\Column(name="c04_rooms", type="smallint")
     */
    private $rooms;

    /**
     * @var decimal $price
     *
     * @ORM\Column(name="c04_price", type="decimal", scale=3)
     */
    private $price;

    /**
     * @var smallint $floor
     *
     * @ORM\Column(name="c04_floor", type="smallint")
     */
    private $floor;

    /**
     * @var smallint $floors
     *
     * @ORM\Column(name="c04_floors", type="smallint")
     */
    private $floors;

    /**
     * @var decimal $s
     *
     * @ORM\Column(name="c04_s", type="decimal", scale=2)
     */
    private $s;

    /**
     * @var string $sl
     *
     * @ORM\Column(name="c04_sl", type="string", length=32)
     */
    private $sl;

    /**
     * @var decimal $sk
     *
     * @ORM\Column(name="c04_sk", type="decimal", scale=2)
     */
    private $sk;

    /**
     * @ORM\ManyToOne(targetEntity="BuildingStage")
     * @ORM\JoinColumn(name="c04_building_stage_id", referencedColumnName="c05_id")
     */
    protected $building_stage;
    
    /**
     * @ORM\ManyToOne(targetEntity="BuildingType")
     * @ORM\JoinColumn(name="c04_building_type_id", referencedColumnName="c03_id")
     */
    protected $building_type;

    /**
     * @ORM\ManyToOne(targetEntity="Operation")
     * @ORM\JoinColumn(name="c04_operation_id", referencedColumnName="c06_id")
     */
    protected $operation;
    
    /**
     * @var string $sdesc
     *
     * @ORM\Column(name="c04_sdesc", type="string", length=255)
     */
    private $sdesc;

    /**
     * @var text $ldesc
     *
     * @ORM\Column(name="c04_ldesc", type="text")
     */
    private $ldesc;

    /**
     * @var string $address
     *
     * @ORM\Column(name="c04_address", type="string", length=128)
     */
    private $address;
    
    /**
     * @ORM\ManyToOne(targetEntity="District", inversedBy="flats")
     * @ORM\JoinColumn(name="c04_district_id", referencedColumnName="c02_id")
     */
    protected $district;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

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
     * Set price
     *
     * @param decimal $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get price
     *
     * @return decimal 
     */
    public function getPrice()
    {
        return $this->price;
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
     * Set sl
     *
     * @param decimal $sl
     */
    public function setSl($sl)
    {
        $this->sl = $sl;
    }

    /**
     * Get sl
     *
     * @return decimal 
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
     * Set sdesc
     *
     * @param string $sdesc
     */
    public function setSdesc($sdesc)
    {
        $this->sdesc = $sdesc;
    }

    /**
     * Get sdesc
     *
     * @return string 
     */
    public function getSdesc()
    {
        return $this->sdesc;
    }

    /**
     * Set ldesc
     *
     * @param text $ldesc
     */
    public function setLdesc($ldesc)
    {
        $this->ldesc = $ldesc;
    }

    /**
     * Get ldesc
     *
     * @return text 
     */
    public function getLdesc()
    {
        return $this->ldesc;
    }


    /**
     * Set address
     *
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set district
     *
     * @param Spb\RealityBundle\Entity\district $district
     */
    public function setDistrict(\Spb\RealityBundle\Entity\district $district)
    {
        $this->district = $district;
    }

    /**
     * Get district
     *
     * @return Spb\RealityBundle\Entity\district 
     */
    public function getDistrict()
    {
        return $this->district;
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

    /**
     * Set building_type
     *
     * @param Spb\RealityBundle\Entity\BuildingType $buildingType
     */
    public function setBuildingType(\Spb\RealityBundle\Entity\BuildingType $buildingType)
    {
        $this->building_type = $buildingType;
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
     * Set operation
     *
     * @param Spb\RealityBundle\Entity\Operation $operation
     */
    public function setOperation(\Spb\RealityBundle\Entity\Operation $operation)
    {
        $this->operation = $operation;
    }

    /**
     * Get operation
     *
     * @return Spb\RealityBundle\Entity\Operation 
     */
    public function getOperation()
    {
        return $this->operation;
    }
}