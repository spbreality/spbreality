<?php

namespace Spb\RealityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Spb\RealityBundle\Entity\Region
 *
 * @ORM\Table(name="t01_region")
 * @ORM\Entity
 */
class Region
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="c01_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="c01_name", type="string", length=64)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="District", mappedBy="region")
     */
    protected $districts;

    public function __construct()
    {
        $this->districts = new ArrayCollection();
    }    

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

    /**
     * Add districts
     *
     * @param Spb\RealityBundle\Entity\District $districts
     */
    public function addDistrict(\Spb\RealityBundle\Entity\District $districts)
    {
        $this->districts[] = $districts;
    }

    /**
     * Get districts
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getDistricts()
    {
        return $this->districts;
    }
}