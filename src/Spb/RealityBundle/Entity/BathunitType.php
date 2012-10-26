<?php

namespace Spb\RealityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Spb\RealityBundle\Entity\BathunitType
 *
 * @ORM\Table(name="t11_bathunit_type")
 * @ORM\Entity
 */
class BathunitType
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="c11_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $abbr
     *
     * @ORM\Column(name="c11_abbr", type="string", length=8)
     * @Assert:NotBlank(message = "Необходимо сокращение")
     */
    private $abbr;

    /**
     * @var string $name
     *
     * @ORM\Column(name="c11_name", type="string", length=128)
     * @Assert:NotBlank(message = "Необходимо название")
     */
    private $name;


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
}