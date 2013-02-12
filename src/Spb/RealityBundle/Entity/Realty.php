<?php

namespace Spb\RealityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Spb\RealityBundle\Entity\Realty
 *
 * @ORM\Table(name="t07_realty")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="c07_object", type="string", length=32)
 * @ORM\DiscriminatorMap({"апартаменты" = "Apartment", "комната"="Room", "квартира"="Flat", "участок"="Land", "дом"="House", "офис"="Office", "склад"="Storehouse", "ОСЗ"="Building"})
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
     * @ORM\Column(name="c07_sdesc", type="string", length=255, nullable=true)
     */
    private $sdesc;

    /**
     * @var text $ldesc
     *
     * @ORM\Column(name="c07_ldesc", type="text", nullable=true)
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
     * @var decimal $longitude
     *
     * @ORM\Column(name="c07_longitude", type="decimal", scale=6)
     */
    private $longitude;
    
     /**
     * @var decimal $latitude
     *
     * @ORM\Column(name="c07_latitude", type="decimal", scale=6)
     */
    private $latitude;

     /**
     * @var string $yandex_map_key
     */
    private $yandex_map_key;
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpdate(){
        
        if (!isset($this->longitude) || !isset($this->latitude))  {
            $this->longitude = 0;
            $this->latitude  = 0;
        }
        
        $url = 'http://geocode-maps.yandex.ru/1.x/?geocode='.urlencode($this->district.', '.$this->address).'&key='.$this->yandex_map_key;
 
        $results = file($url);
        
        if($results && is_array($results) && count($results)) {
            $data=implode("", $results);
 
            if(preg_match("#<pos>([0-9\\.]*) ([0-9\\.]*)</pos>#i", $data, $out)) {
 
                $this->longitude = floatval(trim($out[1]));
                $this->latitude  = floatval(trim($out[2]));
            
            }
        }
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
    
    public function __construct($ymk)
    {
        $this->documents = new \Doctrine\Common\Collections\ArrayCollection();
        $this->yandex_map_key = $ymk;
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
    public function getRealtyType()
    {
        return "realty";
    }
    
    /**
     * Get realty type
     *
     * @return string 
     */
    public function getName($pl = "single", $camel = "no")
    {
        $rtype = $this->getRealtyType();
        $name = "объект";
        $names = "объекты";
        
        switch ($rtype) {
            case "flat":
                $name = "квартира";
                $names = "квартиры";
                break;
            case "room":
                $name = "комната";
                $names = "комнаты";
                break;
            case "land":
                $name = "участок";
                $names = "участки";
                break;
            case "house":
                $name = "дом";
                $names = "дома";
                break;
            case "office":
                $name = "офис";
                $names = "офисы";
                break;
            case "storehouse":
                $name = "склад";
                $names = "склады";
                break;
            case "building":
                $name = "отдельно стоящее здание";
                $names = "отдельно стоящие здания";
                break;
            default:
                break;
        }
        
        if ($pl === "plural") {
            $rstr = $names;
        } else {
            $rstr = $name;
        }
                
        if ($camel === "camel") {
            return $this->mb_ucwords($rstr);
        }
        
        return $rstr;
    }
    
     private function mb_ucwords($str) {
        $str = mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
        return ($str);
    }

    /**
     * Set longitude
     *
     * @param decimal $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * Get longitude
     *
     * @return decimal 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set latitude
     *
     * @param decimal $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * Get latitude
     *
     * @return decimal 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }
}