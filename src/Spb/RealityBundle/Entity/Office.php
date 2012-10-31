<?php
namespace Spb\RealityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Офисные и торговые помещения
 * 
 * Spb\RealityBundle\Entity\Office
 *
 * @ORM\Table(name="t16_office")
 * @ORM\Entity
 */
class Office extends Commercial
{
    /**
     * этаж
     * 
     * @var smallint $floor
     *
     * @ORM\Column(name="c16_floor", type="smallint")
     */
    private $floor;

    /**
     * всего этажей
     * 
     * @var smallint $floors
     *
     * @ORM\Column(name="c16_floors", type="smallint")
     */
    private $floors;
  
    /**
     * тип входа
     * 
     * @ORM\ManyToOne(targetEntity="EntryType")
     * @ORM\JoinColumn(name="c16_entry_type_id", referencedColumnName="c17_id")
     */
    private $entry_type;

    /**
     * Тип объекта недвижимости
     *
     * @return string 
     */
    public function getRealtyType()
    {       
        return "office";
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
     * Set entry_type
     *
     * @param Spb\RealityBundle\Entity\EntryType $entryType
     */
    public function setEntryType(\Spb\RealityBundle\Entity\EntryType $entryType)
    {
        $this->entry_type = $entryType;
    }

    /**
     * Get entry_type
     *
     * @return Spb\RealityBundle\Entity\EntryType 
     */
    public function getEntryType()
    {
        return $this->entry_type;
    }

}