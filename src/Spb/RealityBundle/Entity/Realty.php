<?php

namespace Spb\RealityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Spb\RealityBundle\Entity\Realty
 *
 * @ORM\Table(name="t07_realty")
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="c07_object", type="string", length=32)
 * @ORM\DiscriminatorMap({"комната"="Room", "квартира"="Flat"})
 */

abstract class Realty
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="c07_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
      
    /**
     * @var decimal $price
     *
     * @ORM\Column(name="c07_price", type="decimal", scale=3)
     */
    private $price;
    
   
    /**
     * @ORM\ManyToOne(targetEntity="Operation")
     * @ORM\JoinColumn(name="c07_operation_id", referencedColumnName="c09_id")
     */
    private $operation;
    
    /**
     * @var string $sdesc
     *
     * @ORM\Column(name="c07_sdesc", type="string", length=255)
     */
    private $sdesc;

    /**
     * @var text $ldesc
     *
     * @ORM\Column(name="c07_ldesc", type="text")
     */
    private $ldesc;

    /**
     * @var string $address
     *
     * @ORM\Column(name="c07_address", type="string", length=128)
     */
    private $address;
    
    /**
     * @ORM\ManyToOne(targetEntity="District", inversedBy="realties")
     * @ORM\JoinColumn(name="c07_district_id", referencedColumnName="c02_id")
     */
    private $district;

    /**
     * @ORM\OneToMany(targetEntity="Document", mappedBy="realty")
     */
    private $documents;
    
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

    /**
     * Set district
     *
     * @param Spb\RealityBundle\Entity\District $district
     */
    public function setDistrict(\Spb\RealityBundle\Entity\District $district)
    {
        $this->district = $district;
    }

    /**
     * Get district
     *
     * @return Spb\RealityBundle\Entity\District 
     */
    public function getDistrict()
    {
        return $this->district;
    }
    
    public function __toString()
    {
        return '' . $this->getId();
    }       
    
    public function __construct()
    {
        $this->documents = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add documents
     *
     * @param Spb\RealityBundle\Entity\Document $documents
     */
    public function addDocument(\Spb\RealityBundle\Entity\Document $documents)
    {
        $this->documents[] = $documents;
    }

    /**
     * Get documents
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getDocuments()
    {
        return $this->documents;
    }
    
    /**
     * Get realty type (c07_object)
     *
     * @return string 
     */
    public function getRealtyType($lang = "en", $pl = "single", $camel = "lowcase")
    {
        $rstr = "realty";        
        
        if ($lang === "ru") {
            if($pl === "plural") {
                $rstr = "объект недвижимости";
            }
            $rstr = "объекты недвижимости";                
        }
        
        if ($camel === "camel") {
            $rstr = ucwords($rstr);
        }
        
        return $rstr;
    }
}