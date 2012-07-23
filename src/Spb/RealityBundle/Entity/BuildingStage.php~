<?php

namespace Spb\RealityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Spb\RealityBundle\Entity\BuildingStage
 *
 * @ORM\Table(name="t05_building_stage")
 * @ORM\Entity
 */
class BuildingStage
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="c05_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="c05_name", type="string", length=64)
     * @Assert:NotBlank(message = "Необходимо название")
     */
    private $name;

    /**
     * @var string $abbr
     *
     * @ORM\Column(name="c05_abbr", type="string", length=4)
     * @Assert:NotBlank(message = "Необходимо сокращение")
     */
    private $abbr;

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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    
    public function __toString()
    {
        return $this->getName();
    }    

    /**
     * Set abbr
     *
     * @param string $abbr
     */
    public function setAbbr($abbr)
    {
        $this->abbr = $abbr;
    }

    /**
     * Get abbr
     *
     * @return string 
     */
    public function getAbbr()
    {
        return $this->abbr;
    }
}