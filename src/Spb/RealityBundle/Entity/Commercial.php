<?php

namespace Spb\RealityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Коммерческая недвижимость: офисы, склады, ОСЗ
 * 
 * Spb\RealityBundle\Entity\Commercial
 *
 * @ORM\Table(name="t20_commercial")
 * @ORM\Entity
 */
abstract class Commercial extends Realty
{
    /**
     * площадь помещения
     * 
     * @var string $s
     *
     * @ORM\Column(name="c16_s", type="string", length=32)
     */
    private $s;
   
    /**
     * состояние
     * 
     * @ORM\ManyToOne(targetEntity="StateType")
     * @ORM\JoinColumn(name="c16_state_type_id", referencedColumnName="c18_id")
     */
    private $state_type;   

    /**
     * Set s
     *
     * @param string $s
     */
    public function setS($s)
    {
        $this->s = $s;
    }

    /**
     * Get s
     *
     * @return string 
     */
    public function getS()
    {
        return $this->s;
    }

    /**
     * Set state_type
     *
     * @param Spb\RealityBundle\Entity\StateType $stateType
     */
    public function setStateType(\Spb\RealityBundle\Entity\StateType $stateType)
    {
        $this->state_type = $stateType;
    }

    /**
     * Get state_type
     *
     * @return Spb\RealityBundle\Entity\StateType 
     */
    public function getStateType()
    {
        return $this->state_type;
    }
}