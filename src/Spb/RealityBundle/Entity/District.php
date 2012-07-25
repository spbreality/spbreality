<?php

namespace Spb\RealityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Spb\RealityBundle\Entity\District
 *
 * @ORM\Table(name="t02_district")
 * @ORM\Entity
 */
class District
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="c02_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="c02_name", type="string", length=64)
     * @Assert:NotBlank(message = "Необходимо название района")
     */
    private $name;


    /**
     * @ORM\ManyToOne(targetEntity="Region", inversedBy="districts")
     * @ORM\JoinColumn(name="c02_region_id", referencedColumnName="c01_id")
     */
    protected $region;
    
    /**
     * @ORM\OneToMany(targetEntity="Realty", mappedBy="district")
     */
    protected $realties;

    public function __construct()
    {
        $this->flats = new ArrayCollection();
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
     * Set region
     *
     * @param Spb\RealityBundle\Entity\Region $region
     */
    public function setRegion(\Spb\RealityBundle\Entity\Region $region)
    {
        $this->region = $region;
    }

    /**
     * Get region
     *
     * @return Spb\RealityBundle\Entity\Region 
     */
    public function getRegion()
    {
        return $this->region;
    }


    /**
     * Add flats
     *
     * @param Spb\RealityBundle\Entity\Flat $flats
     */
    public function addFlat(\Spb\RealityBundle\Entity\Flat $flats)
    {
        $this->flats[] = $flats;
    }

    /**
     * Get flats
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getFlats()
    {
        return $this->flats;
    }
    
    public function __toString()
    {
        return $this->getRegion()->getName() . ", " . $this->getName();
    }
    

    /**
     * Add realties
     *
     * @param Spb\RealityBundle\Entity\Realty $realties
     */
    public function addRealty(\Spb\RealityBundle\Entity\Realty $realties)
    {
        $this->realties[] = $realties;
    }

    /**
     * Get realties
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getRealties()
    {
        return $this->realties;
    }
}