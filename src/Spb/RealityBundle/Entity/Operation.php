<?php

namespace Spb\RealityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Spb\RealityBundle\Entity\Operation
 *
 * @ORM\Table(name="t06_operation")
 * @ORM\Entity
 */
class Operation
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="c06_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="c06_name", type="string", length=32)
     */
    private $name;

    /**
     * @var string $abbr
     *
     * @ORM\Column(name="c06_abbr", type="string", length=4)
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
    
    public function __toString()
    {
        return $this->getName();
    }       
}